<?php
$title = $_REQUEST['title'];
$time = $_REQUEST['time'];
$login = $_REQUEST['login'];
$voprs = $_REQUEST['voprs'];
$contact = $_REQUEST['contact'];
if (mail("manager@shop.ru", "���������: $title", "$title \n$time \n $login \n $voprs \n $contact")) {
echo "<center>��������� ".$login.", ���� ��������� �������. ����� ��������� ����� � ���� �������� �������������. ������� �� ������"; } 
else echo "������" ;
?>