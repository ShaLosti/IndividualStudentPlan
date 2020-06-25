<?php
$dblocation = localhost;
$dbname = plan;
$dbuser = root;
$dbpasswd = '';

$link = @mysql_connect($dblocation,$dbuser,$dbpasswd);
if (!$link) 
{
  echo( "<P>� ��������� ������ ������ ���� ������ �� ��������.</P>" );
  exit();
 $only="1";
} 
//else echo "����������";
if (!@mysql_select_db($dbname, $link)) 
{
  echo( "<P>� ��������� ������ ���� ������ �� ��������.</P>" );
  exit();
$only="2";
} 

mysql_query ( "SET NAMES CP1251" ) or die ( mysql_error () );
mysql_query ( "set character_set_client = 'cp1251'" ) or die ( mysql_error () );
mysql_query ( "set character_set_results = 'cp1251'" ) or die ( mysql_error () );
mysql_query ( "set collation_connection = 'cp1251_general_ci'" ) or die ( mysql_error () );
?>