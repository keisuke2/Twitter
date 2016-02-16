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
<form action="<?php echo $this->Html->url('company_add');  ?>"method="POST">
<h2>企業名を追加してください。</h2><input type="text" name="name" size="40">
<h2>企業ホームページののURLを追加してください。</h2><input type="text" name="url" size="40">
<input type="submit" value="追加"></form><br/>