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



企業修正<br/>
<br/>
企業コード<br/>
<?php print $company_edit[0]['Company']['id']; ?>
<br/>
<br/>
<form method="post" action="company_edit">
<input type="hidden" name="id" value="<?php print $company_edit[0]['Company']['id']; ?>">
企業名<br/>
<input type="text" name="name" style="width:200px" value="<?php print $company_edit[0]['Company']['name']; ?>"><br/>

URL<br/>
<input type="text" name="url" style="width:1000px" value="<?php print $company_edit[0]['Company']['url']; ?>"><br/>
user_ID<br/>
<input type="text" name="user_id" style="width:1000px" value="<?php print $company_edit[0]['Company']['user_id']; ?>"><br/>

<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>
</html>