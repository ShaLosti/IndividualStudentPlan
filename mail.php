<?php
$title = $_REQUEST['title'];
$time = $_REQUEST['time'];
$login = $_REQUEST['login'];
$voprs = $_REQUEST['voprs'];
$contact = $_REQUEST['contact'];
if (mail("manager@shop.ru", "Сообщение: $title", "$title \n$time \n $login \n $voprs \n $contact")) {
echo "<center>Уважаемый ".$login.", ваше сообщение принято. Через некоторое время с Вами свяжется преподаватель. Спасибо за работу"; } 
else echo "Ошибка" ;
?>