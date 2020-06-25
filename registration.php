<?php session_start (); ?>
<html>
<center><table>
<form action=''>
<tr><td>Login</td><td><input type="text" name="login"></td></tr>
<tr><td>Password </td><td><input type="text" name="pass1"></td></tr>
<tr><td>Repeat password</td><td><input type="text" name="pass2"></td></tr>
<tr><td>E-mail </td><td><input type="text" name="email"></td></tr>
<?php
if ($_SESSION['group'] == 1) {
include "config.php";
$sql = mysql_query ("SELECT * FROM group_users;");
if($sql)
{
echo "<tr><td>Group </td><td><SELECT name=group>";
while($client = mysql_fetch_array($sql))
{
echo "<option value=$client[id]>$client[name]</option>";
}
echo "</SELECT></td></tr>";
}
 else echo "Error";
}

?>
<tr><td colspan=2><input type=submit value=Registrate></td></tr>
</form></table>
<?php
if (isset($_REQUEST['login']) AND isset($_SESSION['login']) == 'admin')
{

$login = $_REQUEST['login'];

$link = mysql_connect("localhost", "root", "");
mysql_select_db("plan", $link);

$r = mysql_query ("SELECT login FROM users WHERE login='$login'", $link); 

 if ((mysql_num_rows($r) > 0)) { 
 echo "Not unique login"; exit;}

$pass1 = $_REQUEST['pass1'];
$pass2 = $_REQUEST['pass2'];

if ($pass1 <> $pass2) { echo "Passwords must match"; exit;} else { $password = $pass1; }
$email = $_REQUEST['email'];
$group = $_REQUEST['group'];
if ($group == 0) { exit; };
include "config.php";
$query = "INSERT INTO users VALUES  ( NULL, '$login', '$password', '$email','$group')";
$rest = mysql_query($query) or die(mysql_error($rest));
if ($rest) { echo "Success"; } else { echo "2������"; };

}elseif(isset($_REQUEST['login'])){
    echo "You don't have rights for this action";
}
?>
