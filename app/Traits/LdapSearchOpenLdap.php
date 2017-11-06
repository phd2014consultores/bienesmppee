<?php

namespace App\Traits;

trait LdapSearchOpenLdap {

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
    public function getCn($connection, $ldap, $key, $string){
        if ($this->getBind($connection, $ldap[$key]['USERDN'], $ldap[$key]['PASSWORD_USERDN'])) { //hacer el getBind
            $getcn = ldap_search($connection,
                $ldap[$key]['BASE_LDAP'],
                '(&(objectClass=posixAccount)(shadowFlag=1)(givenName=*'.$string.'*))',
                array('givenName', 'pager', 'cn')
            );
        }

        return $getcn;
    }

    /*
    * Obtiene las entrada del resultado de la búsqueda del Ldap
    */
    public function getEntries($connection, $getcn){
        return @ldap_count_entries($connection , $getcn);

        #return (@ldap_count_entries($connection , $getcn) > 0) ? ldap_count_entries($connection , $getcn) : false;
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
    public function getAttributes($connection, $getcn, $key, $counts){

        $info = ldap_get_entries($connection, $getcn);

        for ($i=0; $i < $info["count"]; $i++) {
            $datos[] = array(
                'cn' => $info[$i]["cn"][0],
                //'pager' => $info[$i]["pager"][0],
            );
        }

        return $datos;
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
    public function ldapSearchOpenLdap($string){

        $ldap = config('openldap.ldap');
        $connection = $this->connection($ldap, 'mppee');

        if ($connection) {
            $getcn = $this->getCn($connection, $ldap, 'mppee', $string);

            if( $counts = $this->getEntries($connection, $getcn)) {

                if($users = $this->getAttributes($connection, $getcn, 'mppee', $counts)) {
                    return response()->json($users, 200);
                }
            }

            return response()->json(['error' => 'Not found'],503);

        }

        return response()->json(['error' => 'Service Unavailable.'],503);
        $this->disconnect($connection);
    }

}
?>