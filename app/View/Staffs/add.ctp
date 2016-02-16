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
<h2>■ スタッフ追加</h2><br/>
<br/>
<form method="post" action="<?php echo $this->Html->url('/Staffs/add');  ?>">
	<h3>スタッフ名を入力してください</h3><br/>
	<input type="text" name="name" style="width:200px"><br/>
	<h3>パスワードを入力してください</h3><br/>
	<input type="password" name="password" style="width:200px"><br/>
	<h3>パスワードをもう一度入力してください<h3><br/>
	<input type="password" name="password2" style="width:200px"><br/>
	<br/>
	<input type="submit" value="OK">
</form>
</body>
</html>