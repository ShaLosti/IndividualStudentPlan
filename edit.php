<?php
session_start ();
$type = $_REQUEST['type'];
$id = $_REQUEST['id'];
include "config.php";
if (isset($type)) {
switch ($type) {

case editplanirovanie:
echo "<center><h3>Редактирование</h3><table><form action='save.php'>";
$sql=mysql_query("select * from planirovanie WHERE id=$id;");
if ($sql) {
while($get_post = mysql_fetch_array($sql))
{
echo "<tr><td>Название</td><td> <input type=text name='title' value='".$get_post[title]."'></td></tr>
<input type=hidden name=id value=$id>
<input type=hidden name=type value=$type>
<tr><td colspan=2>Описание<br> <textarea rows='10' cols='30' name='decription'>".$get_post[decription]."</textarea></td></tr>
<tr><td>Часов</td><td> <input type=text name='time' value='".$get_post[time]."'></td></tr>
<tr><td>Аттестация</td><td> <input type=text name='attestacia' value='".$_SESSION[login]."'></td></tr>
<tr><td>Категория</td><td><select name='category'>";
$sql2 = mysql_query ("SELECT * FROM category;");

if($sql2)
{
while($group = mysql_fetch_array($sql2))
{
echo "<option value='".$group[id]."'>".$group[name]."</option>";
}
echo "</select></td></tr><tr><td colspan=2><input type=submit value=Сохранить></form></td></tr></table></center>";
}}}
break;

case delplanirovanie:
mysql_query("delete from planirovanie where id=$id");
echo ("<script language=\"JavaScript\"> 
  window.location.href = \"view.php\"
</script>");
break;

case vopros:
if (isset($_SESSION[login])) {
echo "<center><h3>Сообщение</h3><table><form action='mail.php'>";
$sql=mysql_query("select * from planirovanie WHERE id=$id;");
if ($sql) {
while($get_post = mysql_fetch_array($sql))
{
echo "<tr><td>Наименование</td><td> <input type=text name='title' value='".$get_post[title]."'></td></tr>
<tr><td>Часов</td><td> <input type=text name='time' value='".$get_post[time]."'></td></tr>";

echo "<tr><td>Ваш логин </td><td> <input type=text name='login' value='".$_SESSION[login]."'></td></tr>"; 

echo "<tr><td colspan=2>Сообщение<br> <textarea rows='5' cols='30' name='adres'>ВВедите ваше сообщение</textarea></td></tr>
<tr><td colspan=2>Контактные данные<br> <textarea rows='5' cols='30' name='contact'>Пример: Иванов Иван Иванович, группа 12345, тел. +375(29)6746543, email ivanov@tut.by</textarea></td></tr>
<tr><td colspan=2><input type=submit value=Отправить></form></td></tr></table></center>";
}}
break;
} else echo "<center>Для отправки сообщения вы должны <a href=registration.php> зарегистрироваться </a> или <a href=index.php>авторизироваться ";}
} else echo "Данные не получены";
?>
