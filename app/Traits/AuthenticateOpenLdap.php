<?php

namespace App\Traits;

use Auth;
use App\User;

trait AuthenticateOpenLdap {

  /*
   *  Conexión con OpenLdap
  */
  public function connection($ldap, $key){
      if($connection = ldap_connect($ldap[$key]['LDAP_HOST'], $ldap[$key]['LDAP_PORT'])){
        ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);
        return $connection;
      }else{
        return false;
      }
  }

  /*
  *  Obtiene el cn del usuario
  */
  public function getCn($connection, $ldap, $key, $username){
    if (array_key_exists('ANONIMOUS', $ldap[$key]) && $ldap[$key]['ANONIMOUS'] === true){
      $getcn = ldap_search($connection,
                           $ldap[$key]['BASE_LDAP'],
                           str_replace('%s', $username, $ldap[$key]['FILTER_USER']),
                           array('cn', 'givenName', 'sn', 'cardLicense', 'uid', 'mail', 'gender', 'l', 'ou')
                        );
    }else{
      if ($this->getBind($connection, $ldap[$key]['USERDN'], $ldap[$key]['PASSWORD_USERDN'])) { //hacer el getBind
        $getcn = ldap_search($connection,
                             $ldap[$key]['BASE_LDAP'],
                             str_replace('%s', $username, $ldap[$key]['FILTER_USER']),
                             array('cn', 'givenName', 'sn', 'pager', 'uid', 'mail','gender', 'l', 'ou', 'employeeType')
                          );
      }else{
        return false;
      }
    }

    // verificar que el campo gender, l y ou estén en el ldap de corpoelec
    return $getcn;
  }

  /*
  * Obtiene las entrada del resultado de la búsqueda del Ldap
  */
  public function getEntries($connection, $getcn){
    return (@ldap_count_entries($connection , $getcn) > 0) ? true : false;
  }

  /*
  * Hace bind en OpenLdap
  */
  public function getBind($connection, $dn_user, $password){
    return @ldap_bind($connection, $dn_user, $password);
  }

  /*
  * Obtiene los atributos del usuario autenticado en el LDAP
  */
  public function getAttributes($connection, $getcn, $password, $key){

    $entry_user = ldap_first_entry($connection, $getcn);
    $dn_user    = ldap_get_dn($connection, $entry_user);

    if ($this->getBind($connection, $dn_user, $password)){

        $entry = ldap_first_entry($connection, $getcn);
        $info = ldap_get_attributes($connection, $entry);

        for ($i=0; $i < $info["count"]; $i++) {
             $values = ldap_get_values($connection, $entry, $info[$i]);
             $datos[$info[$i]] = $values[0];
        }
        if ($key === "corpoelec") {
          $datos['pager'] = $datos['carLicense'];
	  $datos['o'] = "CORPOELEC";
          unset($datos['carLicense']);
	}else{
	  $datos['o'] = "MPPEE";
	}

        return $datos;
      }else{
        return false;
      }
  }

  /**
  * Obtiene los roles del ldap
  * @return $user que son los attributos del ldap donde estan los roles
  */
  public function getRole($connection, $ldap, $key, $user, $username){
    if (!array_key_exists('ANONIMOUS', $ldap[$key])){
      $this->getBind($connection, $ldap[$key]['USERDN'], $ldap[$key]['PASSWORD_USERDN']);
      $getRole = ldap_search($connection, $ldap[$key]['BASE_ROLE'], str_replace("%s" , $username, $ldap[$key]['FILTER_ROLE']), array("cn"));
      $entry = ldap_first_entry($connection, $getRole);

      if ($entry){
        do {
          $values = ldap_get_values($connection, $entry, "cn");
          for ($i=0; $i < $values["count"]; $i++) {
             $role[] = $values[$i];
          }
        } while ($entry = ldap_next_entry($connection, $entry));

       $user['role'] = $role;
       }
     }
     return $user;
  }

  /*
  * Desconexión del OpenLdap
  */
  public function disconnect($connection){
        ldap_close($connection);
  }

  /*
  * Login con el ldap
  */
  public function loginOpenLdap($request){
        $username  = $request->input('username');
        $password  = $request->input('password');

        $ldap = config('openldap.ldap');
        $userDb = NULL;
        foreach ($ldap as $key => $value) {
            $connection = $this->connection($ldap, $key);
            if ($connection) {
                $getcn = $this->getCn($connection, $ldap, $key, $username);

                if($this->getEntries($connection, $getcn)) {

                  if($user = $this->getAttributes($connection, $getcn, $password, $key)) {
                      $user = $this->getRole($connection, $ldap, $key, $user, $username);
                      $role = '';
                      if (in_array("ROLE_USER", $user['role'])) {
                          $role = 'ROLE_USER';
                      }
                      if (in_array("ROLE_ADMIN", $user['role'])) {
                          $role = 'ROLE_ADMIN';
                      }
                      if ($role != '') {
                          $user['role'] = $role;
                          $userDb = User::updateOrCreate([ 'mail' => $user['mail'] ], $user);
                          Auth::login($userDb);
                      }else{
                          return response()->json(['error' => 'Permission denied.'],403);
                      }

                   }
                 }
            }else{
              return response()->json(['error' => 'Service Unavailable.'],503);
            }
      }
      return ($userDb) ? response()->json(['data' => $userDb], 200) : response()->json(['error' => 'Not authorized.'],401);
      $this->disconnect($connection);
  }

}
?>
