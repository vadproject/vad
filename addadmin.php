<?php

    require("session_start.php");

    $username = $_SESSION['user']['username'];
    $password = $_SESSION['user']['password'];
    $adduser = trim(mysql_real_escape_string($_POST['addusername']));

if(authenticate($username, $password)==true)
{
    if(isset($_SESSION['newadmin']['firstname']) && $_SESSION['newadmin']['firstname']!="" )
    {

        require("databaseconnect.php");

        $result = mysql_query("SELECT * from admins");
        
        while($adminrow = mysql_fetch_array($result)){
            
            if($adduser==$adminrow['admin']){
                $storeuser = $adminrow['admin'];
                header("Location:accounts.php?notadded='yes'");
            }
        }
            
            if($adduser!=$storeuser){
            $sql = " INSERT INTO admins (ID,admin) VALUES('','$adduser')";

            if (!mysql_query($sql,$con)){
                die('Error: ' . mysql_error());
            }
            header("Location:accounts.php?adminadded='yes'");
            }
        mysql_close();
    }

    else {
        header("Location:accounts.php?invaliduser='yes'");
    }
}


function authenticate($user, $pass) 
{
    $newadminuser = $_POST['addusername'];
    if($user != '' && $pass != '')
    {        
        $ldap_dn = "uid=".$user.", ou=Employees, o=Lexmark"; 
        $ldap = ldap_connect("157.184.37.82");
        // verify user and password
        $bind = ldap_bind($ldap, $ldap_dn, $pass);
        if($bind)
        {
            $filter="(objectClass=*)";
            $search_user = "uid=".$newadminuser.", ou=Employees, o=Lexmark";
            $result = ldap_search($ldap, $search_user, $filter);
            $entries = ldap_get_entries($ldap, $result);
            ldap_unbind($ldap);
            
            $displayName = $entries[0]  ['displayname'][0];
            $firstName = $entries[0]['givenname'][0];
            $lastName = $entries[0]['sn'][0];
            
            
            $_SESSION['newadmin'] = array(
                'displayname' => $displayName, 
                'username' => $user,
                'firstname' => $firstName,
                'lastname' => $lastName);            
            
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