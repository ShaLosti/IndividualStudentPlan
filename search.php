<?php session_start(); ?>
<html>
<head>
<title>Search</title>
<body>
<center>
<form action="">
<table border=0>
<tr><td>Search by name</td><td><input type=text name=planirovanie></td></tr>
<tr><td><input type=submit value=Search></td><td><input type=reset value=Reset></td></tr>
</table></form>
</body>
</html>
<?php
if (isset($_REQUEST['planirovanie'])) {
if(!isset($_SESSION['group'])) {echo 'Log in pls'; exit;}
include "config.php";
$planirovanie = $_REQUEST['planirovanie'];
$rest=mysql_query("SELECT * FROM planirovanie WHERE  title LIKE '%$planirovanie%';");
if ($rest) {
 echo "<table  width=100% border=0>
<tr><td>Title</td><td>Description</td><td>Hours</td><td>Certification</td></tr>";
  while($s_planirovanie = mysql_fetch_array($rest))
  {
 echo "<tr >
      <td>".$s_planirovanie['title']."</td>
	<td width=300>".$s_planirovanie['decription']."</td>
	<td>".$s_planirovanie['time']."</td>
	<td>".$s_planirovanie['attestacia']."</td>
	<td><input type=button onclick='window.location=\"edit.php?type=vopros&id=$s_planirovanie[id]\"' value=Message><br>";  
	if ($_SESSION['group'] == 1) { 
echo "<input type=button onclick='window.location=\"edit.php?type=editplanirovanie&id=$s_planirovanie[id]\"' value=Edit><br>
<input type=button onclick='window.location=\"edit.php?type=delplanirovanie&id=$s_planirovanie[id]\"' value=Delete></td></tr>";
}
else { 
echo "</td></tr>";
  }}
echo ("</table>");
 } else echo "�� �������";
}
?>