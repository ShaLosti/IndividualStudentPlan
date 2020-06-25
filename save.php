<?php
$type = $_REQUEST['type'];
echo $type;
$id = $_REQUEST['id'];
include "config.php";
if (isset($type)) {
switch ($type) {

case editplanirovanie:
$title = $_REQUEST['title'];
$decription = $_REQUEST['decription'];
$time = $_REQUEST['time'];
$attestacia = $_REQUEST['attestacia'];

$category = $_REQUEST['category'];
IF (mysql_query("update planirovanie set title = '$title', decription = '$decription', time = '$time', attestacia = '$attestacia', category = '$category' where id=$id")) { echo "1";} else echo "������ - ".mysql_error();
echo ("<script la1nguage=\"JavaScript\"> 
  window.location.href = \"/view.php\"
</script>");
break;

}
} else echo "������ �� ��������";
?>
