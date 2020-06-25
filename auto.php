<?php
session_start();
switch ($_REQUEST['add']) {
case auto:
$login= $_REQUEST['login'];
$pass= $_REQUEST['pass'];
include "config.php";
$rest=mysql_query("SELECT * FROM users WHERE (login='$login') AND (password='$pass')") or die(mysql_error($rest));
if (mysql_num_rows($rest)==0)
   {
      echo ("<center> Incorrect login/password<br></center>");
   }
   else
   {
while($cookie = mysql_fetch_array($rest))
  { 
$_SESSION ['login'] = $login;
$_SESSION ['group'] = $cookie['group'];
}

 echo ("<script language=\"JavaScript\"> 
  window.location.href = \"view.php\"
</script>");

break;
   }
case out:
unset($_SESSION['login']);
unset($_SESSION['group']);
echo ("<script language=\"JavaScript\"> 
  window.location.href = \"view.php\"
</script>");
break;
}

?>