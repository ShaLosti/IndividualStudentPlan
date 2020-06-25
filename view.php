<?php
session_start ();
include "config.php";
$category = $_REQUEST['category'];
if (isset($category)) {
$ath = mysql_query("select * from planirovanie where category=$category;");
if(mysql_num_rows($ath) > 0 )
{
  echo "<table  width=100% border=0>
<tr><td>Title</td><td>Description</td><td>Hours</td><td>Certification</td><td>Operation</td></tr>";
  while($get_planirovanie = mysql_fetch_array($ath))
  { echo "<tr >
    <td>".$get_planirovanie['title']."</td>
	<td width=300>".$get_planirovanie['decription']."</td>
	<td>".$get_planirovanie['time']."</td>
	<td>".$get_planirovanie['attestacia']."</td>
	<td><input type=button onclick='window.location=\"edit.php?type=vopros&id=$get_planirovanie[id]\"' value=Message><br>";  
	if ($_SESSION['group'] == 1) { 
echo "<input type=button onclick='window.location=\"edit.php?type=editplanirovanie&id=$get_planirovanie[id]\"' value=Edit><br>
<input type=button onclick='window.location=\"edit.php?type=delplanirovanie&id=$get_planirovanie[id]\"' value=Delete></td></tr>";
} else { 
echo "</td></tr>";
echo $_SESSION['group'];
 } }
  echo "</table>";
  } else {  echo "<p><b><center>".mysql_error()."</b><p>";   exit(); }

}
else 
{
$ath = mysql_query("select DISTINCT * from planirovanie;");
if($ath)
{

  echo "<table  width=100% border=0>
<tr><td>Title</td><td>Description</td><td>Hours</td><td>Certification</td><td>Operation</td></tr>";
  while($get_planirovanie = mysql_fetch_array($ath))
  { echo "<tr >
    <td>".$get_planirovanie['title']."</td>
	<td width=300>".$get_planirovanie['decription']."</td>
	<td>".$get_planirovanie['time']."</td>
	<td>".$get_planirovanie['attestacia']."</td>
	<td><input type=button onclick='window.location=\"edit.php?type=vopros&id=$get_planirovanie[id]\"' value=Message><br>";  
	if ($_SESSION['group'] == 1) { 
echo "<input type=button onclick='window.location=\"edit.php?type=editplanirovanie&id=$get_planirovanie[id]\"' value=Edit><br>
<input type=button onclick='window.location=\"edit.php?type=delplanirovanie&id=$get_planirovanie[id]\"' value=Delete></td></tr>";
} else { 
  echo $_SESSION['group'];
echo "</td></tr>";
 } }
  echo "</table>";
  } else {  echo "<p><b>Error: ".mysql_error()."</b><p>";   exit(); }

}
?>