<?php
session_start ();
include 'config.php'; 


// ������� ���������� � ����������� �����:
echo "<h3>���������� � ���������: </h3>";
$title = $_REQUEST['title'];
echo "<br>��������: ".$title;
$description = $_REQUEST['description'];
echo "<br>��������: ".$description;
$time = $_REQUEST['time'];
echo "<br>�����: ".$time;
$dateadd = date( 'l d F', time() );
echo "<br>���� ����������: ".$dateadd;
$attestacia = $_SESSION['login'];
echo "<br>����������: ".$attestacia;
$category = $_REQUEST['category'];



$ins_planirovanie = mysql_query("INSERT INTO planirovanie VALUES ('NULL', '$title', '$description', '$time', '$attestacia', '$dateadd','$category')");
if ($ins_planirovanie) { echo "<br>�������� ��������"; } else {echo "<br>������ ��� ���������� ".mysql_error();}


?>