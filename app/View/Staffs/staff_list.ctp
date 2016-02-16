<?php
session_start();
session_regenerate_id(true);

if(isset($_SESSION['login'])==false)
{
	print'ログインされていません<br/>';
	print'<a href="../Staffs/login">ログイン画面へ</a>';
	exit();
}
else
{
	print $_SESSION['staff_name'];
	print'さんログイン中<br/>';
	print'<br/>';
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>
スタッフ一覧


<?php

print'<form method="post" action="staff_list">';
foreach ($staff_list as $rec) {
	if($rec==false)//これがないと止まらなくなる。ループし続ける
	{
		break;
	}
    echo'<input type="radio" name="id" value="'.$rec['Staff']['id'].'">';
	echo '<h3>';
	echo'_';
	echo $rec['Staff']['name'];
	echo '</h3>';
	echo '<br>';


}

echo'<input type="submit" name="disp" value="参照">';
echo'<input type="submit" name="add" value="追加">';
echo'<input type="submit" name="edit" value="修正">';
echo'<input type="submit" name="delete" value="削除">';
echo'</form>';
/*
try
{

$dsn='mysql:dbname=jobhunt2;host=localhost';
$user='root';
$password='root';
$dbh= new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

$sql='SELECT code,name FROM staffs WHERE 1';//mst_staffテーブルのnameフィールドの値を全て取り出す
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print'スタッフ一覧<br/><br/>';

print'<form method="post" action="staff_branch.php">';

while(true)
{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)//これがないと止まらなくなる。ループし続ける
	{
		break;
	}
	print'<input type="radio" name="staffcode" value="'.$rec['code'].'">';
	print $rec['name'];
	print'<br/>';
}
print'<input type="submit" name="disp" value="参照">';
print'<input type="submit" name="add" value="追加">';
print'<input type="submit" name="edit" value="修正">';
print'<input type="submit" name="delete" value="削除">';
print'</form>';


}
catch(Exception $e)
{
	print'ただいま障害により大変ご迷惑をおかけしています';
	exit();
}
*/

?>
<br/>
<a href="index">トップメニューへ</a><br/>
</body>
</html>