<?php
$_SESSION=array();
if(isset($_COOKIE[session_name()])==true)
{
	setcookie(session_name(),'',time()-42000,'/');
}
@session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ろくまる農園</title>
</head>
<body>
	ログアウトしました<br/>
	<br/>
	<?php echo $this->Html->link('ログイン画面へ','/Staffs/login/'); ?><br>
</body>
</html>