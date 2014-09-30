<?php

require("session_start.php");


$username = htmlspecialchars(mysql_real_escape_string(isset($_POST['shortname']) ? $_POST['shortname'] : ''));
$password = htmlspecialchars(mysql_real_escape_string(isset($_POST['pass']) ? $_POST['pass'] : ''));



if(authenticate($username, $password)==true)
{
   //User successfully logged in.
  
    header("Location: ../vadproject/index.php");
}
else if(authenticate($username, $password)==false)
{
    
    header("Location: ../vadproject/login.php?login_failed=yes");
}

function check_logged(){ 
    global $_SESSION; 
    if(!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
        header("Location: login.php"); 
        die();
    }; 
}; 

function authenticate($user, $password) 
{
    if($user != '' && $password != '')
    {        
        $ldap_dn = "uid=".$user.", ou=Employees, o=Lexmark"; 
        $ldap = ldap_connect("157.184.37.82");
        // verify user and password
        $bind = ldap_bind($ldap, $ldap_dn, $password);
        if($bind)
        {
            $filter="(objectClass=*)";
            $result = ldap_search($ldap, $ldap_dn, $filter);
            $entries = ldap_get_entries($ldap, $result);
            ldap_unbind($ldap);
            
            $displayName = $entries[0]  ['displayname'][0];
            $firstName = $entries[0]['givenname'][0];
            $lastName = $entries[0]['sn'][0];
            
            
            $_SESSION['user'] = array(
                'displayname' => $displayName, 
                'username' => $user,
                'firstname' => $firstName,
                'lastname' => $lastName,
                'password' => $password);            
            
            return true;
        } 
        else 
        {
            
            return false;
        }
    }
    return false;
};


?>