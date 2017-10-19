<?php
  return [

    'ldap' => [
        'mppee' => [
                    'LDAP_HOST'       => 'rubenblades.mppee.gob.ve',
                    'USERDN'          => 'cn=reader,ou=accounts,ou=Administradores,dc=mppee,dc=gob,dc=ve',
                    'PASSWORD_USERDN' => 'Ez47e84THFU99T',
                    'FILTER_USER'    => '(&(objectClass=posixAccount)(shadowFlag=1)(uid=%s))',
                    'BASE_LDAP'       => 'ou=Usuarios,dc=mppee,dc=gob,dc=ve',
                    'BASE_ROLE'      => 'ou=OpenKM,ou=Aplicaciones,dc=mppee,dc=gob,dc=ve',
                    'FILTER_ROLE'    => '(&(objectClass=posixGroup)(memberUid=%s))',
                    'LDAP_PORT'       => '389'
        ],
        'corpoelec' => [
                    'LDAP_HOST'       => 'ldapr1-sb.corpoelec.com.ve',
                    'BASE_LDAP'       => 'dc=corpoelec,dc=gob,dc=ve',
                    'FILTER_USER'    => '(&(objectClass=posixAccount)(mail=%s))',
                    'LDAP_PORT'       => '389',
                    'ANONIMOUS'       => true
        ]
    ],

  ];
?>
