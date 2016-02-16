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
ユーザ一覧

アップデート


<?php

print'<form method="post" action="user_list">';
foreach ($user_list as $rec) {
	if($rec==false)//これがないと止まらなくなる。ループし続ける
	{
		break;
	}
    echo'<input type="radio" name="id" value="'.$rec['User']['id'].'">';
	echo '<h3>';
	echo'_';
	echo $rec['User']['nick_name'];
	echo '</h3>';
	echo '<br>';
}

echo'<input type="submit" name="disp" value="参照">';
echo'<input type="submit" name="edit" value="修正">';
echo'<input type="submit" name="delete" value="削除">';
echo'</form>';


?>
<br/>
<a href="index">トップメニューへ</a><br/>
</body>
</html>