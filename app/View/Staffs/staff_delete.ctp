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

スタッフ削除<br/>
<br/>
スタッフコード<br/>
<?php print $staff_delete[0]['Staff']['id']; ?>
<br/>
スタッフ名<br/>
<?php print $staff_delete[0]['Staff']['name']; ?>
<br/>
このスタッフを削除してもよろしいですか?<br/>
<br/>

<form method="post" action="staff_delete">
<input type="hidden" name="id" value="<?php print $staff_delete[0]['Staff']['id'];  ?>">

<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>