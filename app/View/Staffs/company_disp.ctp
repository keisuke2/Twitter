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

企業情報参照<br/>
<br/>
企業コード<br/>
<?php print $company_disp[0]['Company']['id']; ?>
<br/>
企業名<br/>
<?php print $company_disp[0]['Company']['name']; ?>
<br/>
企業URL<br/>
<?php print $company_disp[0]['Company']['url']; ?>
<br/>
<br/>
<form>
<input type="button" onclick="history.back()" value="戻る">

</form>






</body>
</html>