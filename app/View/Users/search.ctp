<?php

if(isset($_SESSION['login'])==false)
{/*
	echo'ログインされていません。<br/>';
	echo '<a href="../Users/login">ログイン画面へ</a>'; 
	exit();
	*/

}
else
{
	//$_SESSION['member_name']=$user_data[0]['User']['username'];
	print $_SESSION['name'];
	print'さんログイン中<br/>';
	print'<br/>';
}
?>
	<h2>ユーザー名</h2><br/>
	<?php foreach ($user_list as $row): ?>
	<div id="post_contents">
		<section>
			<article class="articleList">
				<a href="<?php echo '/users/profile/'.$user_list[0]['User']['id']; ?>">
				<table >
					<tr>
					<td>
					<h3><?php echo $row['User']['name'];?></h3> 
					</td>
					</tr>
				</table>
				</a>
			</article>
		</section>
	</div>
	<?php endforeach; ?>
<a href="/Companies/index">戻る</a> 

