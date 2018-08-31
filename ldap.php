<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$ldapconfig['host'] = '192.168.0.15'; //Change your host
$ldapconfig['port'] = 389;         //Default port
$ldapconfig['basedn'] = 'dc=htp,dc=local'; //change your basedn
$username = "mverma";        //Change your username
$password = "1234";
$displayUserName= "Manoj Verma";

$ds=ldap_connect($ldapconfig['host'], $ldapconfig['port']);

ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);

$dn="uid=".$username.",ou=users,".$ldapconfig['basedn'];

//$dn="cn=".$displayUserName.",ou=users,".$ldapconfig['basedn'];

if ($bind=ldap_bind($ds, $dn, $password)) {
    echo("Login correct");
} else {

    echo("Unable to bind to server.</br>");

    echo("msg:'".ldap_error($ds)."'</br>");#check if the message isn't: Can't contact LDAP server :)
    #if it say something about a cn or user then you are trying with the wrong $dn pattern i found this by looking at OpenLDAP source code :)
    #we can figure out the right pattern by searching the user tree
    #remember to turn on the anonymous search on the ldap server

    if ($bind=ldap_bind($ds)) {

        $filter = "(cn=*)";

        if (!($search=@ldap_search($ds, $ldapconfig['basedn'], $filter))) {
            echo("Unable to search ldap server<br>");
            echo("msg:'".ldap_error($ds)."'</br>");#check the message again
        } else {
            $number_returned = ldap_count_entries($ds,$search);
            $info = ldap_get_entries($ds, $search);
            echo "The number of entries returned is ". $number_returned."<p>";

            for ($i=0; $i<$info["count"]; $i++) {
              //  print_r($info[$i]);#look for your user account in this pile of junk and apply the whole pattern where you build $dn to match exactly the ldap tree entry
            }
        }

    } else {
        echo("Unable to bind anonymously<br>");
        echo("msg:".ldap_error($ds)."<br>");
    }
}