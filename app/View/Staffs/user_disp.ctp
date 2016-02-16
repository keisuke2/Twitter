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

ユーザー情報参照<br/>
<br/>
ユーザーID<br/>
<?php print $user_disp[0]['User']['id']; ?>
<br/>
大学名<br/>
<?php print $user_disp[0]['User']['nick_name']; ?>
<br/>
メールアドレス<br/>
<?php print $user_disp[0]['User']['email']; ?>
<br/>
卒業年度<br/>
<?php print $user_disp[0]['User']['graduate']; ?>
<br/>
<br/>
<form>
<input type="button" onclick="history.back()" value="戻る">

</form>
</body>
</html>