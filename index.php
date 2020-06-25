<?php
session_start();
if (isset($_SESSION['login']))  {
if (isset($_SESSION['group']) == 1) {
echo "
<table width=100% border=0>
<tr>
	<td><a href=registration.php> Registration </a><br>
         <a href=1.php> Add new </a><br>
         <a href=view.php> View all disciplines</a><br>
         <a href='auto.php?add=out' title=Logout> End session </a></td>
	
</tr>

</table>

";
} else  { echo "
<table width=100% border=0>
<tr>
	<td>       
         <a href=view.php>View all disciplines</a><br>
         <a href='auto.php?add=out' title=Logout> 555 555 </a></td>
	
</tr>

</table>

";}

} else {

echo "<center><table border=0>
<form  action=auto.php method=post>
<tr><td>Login <td><input type=text size=15 name=login> &nbsp; </tr>
<tr><td>Password<td><input type=password size=15 name=pass>&nbsp; </tr>
<tr><td><input type=submit value=Login><td><input type=reset value=Reset><input type=hidden name=add value=auto></tr>
</form></table>";
}

?>
