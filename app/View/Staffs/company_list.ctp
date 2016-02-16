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
企業一覧


<?php

print'<form method="post" action="company_list">';
foreach ($company_list as $rec) {
	if($rec==false)//これがないと止まらなくなる。ループし続ける
	{
		break;
	}
    echo'<input type="radio" name="id" value="'.$rec['Company']['id'].'">';
	echo '<h3>';
	echo'_';
	echo $rec['Company']['name'];
	echo '</h3>';
	echo '<br>';


}

echo'<input type="submit" name="disp" value="参照">';
echo'<input type="submit" name="add" value="追加">';
echo'<input type="submit" name="edit" value="修正">';
echo'<input type="submit" name="delete" value="削除">';
echo'</form>';


?>
<br/>
<a href="index">トップメニューへ</a><br/>
</body>
</html>