<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" /> 
<title>��������</title></head>
<body>
<form action=upload.php method=post enctype=multipart/form-data>
<input type=file name=uploadfile><br>
�������� <input type=text name=title><br>
�������� <textarea rows=10 cols=45 name=description></textarea><br>
���������� <input type=text name=price><br>
<?php
include "config.php";
$sql = mysql_query ("SELECT * FROM category;");

if($sql)
{
echo "��������� <SELECT name=category>";
while($client = mysql_fetch_array($sql))
{
echo "<option value=$client[id]>$client[name]</option>";
}
echo "</SELECT><br>";
}
 else echo "������";
?>
<input type=submit value=���������></form>
</body>
</html>