<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" /> 
<title>Загрузка</title></head>
<body>
<form action=upload.php method=post enctype=multipart/form-data>
<input type=file name=uploadfile><br>
Название <input type=text name=title><br>
Описание <textarea rows=10 cols=45 name=description></textarea><br>
Аттестация <input type=text name=price><br>
<?php
include "config.php";
$sql = mysql_query ("SELECT * FROM category;");

if($sql)
{
echo "Категория <SELECT name=category>";
while($client = mysql_fetch_array($sql))
{
echo "<option value=$client[id]>$client[name]</option>";
}
echo "</SELECT><br>";
}
 else echo "Ошибка";
?>
<input type=submit value=Загрузить></form>
</body>
</html>