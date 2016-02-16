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
スタッフ修正<br/>
<br/>
スタッフコード<br/>
<?php print $staff_edit[0]['Staff']['id']; ?>
<br/>
<br/>
<form method="post" action="staff_edit">
スタッフ名<br/>
<input type="text" name="name" style="width:200px" value="<?php print $staff_edit[0]['Staff']['name']; ?>"><br/>

パスワードを入力してください<br/>
<input type="password" name="password" style="width:100px"><br/>
パスワードをもう一度入力してください<br/>
<input type="password" name="password2" style="width:100px"><br/>
<input type="hidden" name="id" value='<?php echo $staff_edit[0]['Staff']['id']; ?>'>
<br/>
<input type="button" onclick="history.back()" value="戻る">

<input type="submit" value="OK">
</form>






</body>
</html>