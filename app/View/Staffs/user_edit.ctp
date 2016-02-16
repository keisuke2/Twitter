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
ユーザー修正<br/>
<br/>
ユーザーコード<br/>
<?php print $user_edit[0]['User']['id']; ?>
<br/>
<br/>
<form method="post" action="user_edit">
<input type="hidden" name="id" value="<?php print $user_edit[0]['User']['id']; ?>">
ニックネーム<br/>
<input type="text" name="nick_name" style="width:200px" value="<?php print $user_edit[0]['User']['nick_name']; ?>"><br/>
大学名<br/>
<input type="text" name="uni_name" style="width:1000px" value="<?php print $user_edit[0]['User']['uni_name']; ?>"><br/>
ポイント<br/>
<input type="text" name="point" style="width:200px" value="<?php print $point_edit[0]['Point']['point']; ?>"><br/>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>
</html>