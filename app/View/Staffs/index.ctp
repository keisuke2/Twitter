<?php
/*
session_start();
session_regenerate_id(true);
*/

if(isset($_SESSION['login'])==false)
{
	print'ログインされていません<br/>';
	print'<a href="/Staffs/login">ログイン画面へ</a>';
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
管理トップメニュー<br/>
<br/>
<a href="../Staffs/staff_list">スタッフ管理</a><br/>
<br/>
<a href="../Staffs/company_list">企業管理</a><br/>
<br/>
<a href="../Staffs/user_list">ユーザー管理</a><br/>
<br/>
<a href="../Staffs/score_update">日付-1</a><br/>
<br/>
<a href="logout">ログアウト</a><br/>

</body>
</html>