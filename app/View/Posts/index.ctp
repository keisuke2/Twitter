<?php
/*
session_start();//すでにコントローラーでスタートしてるからいらないみたい１!
session_regenerate_id(true);
*/

if(isset($_SESSION['login'])==false)
{
	print'ログインされていません。<br/>';
	print'<a href="../Users/login">ログイン画面へ</a>';
	exit();
}
else
{
	$_SESSION['user_id'];
	$_SESSION['image'];
	$_SESSION['name'];
}

?>
<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>PHP基礎</title>
</head>
<body>
	<?php echo $_SESSION['user_id'];?>
	<?php echo 	$_SESSION['image']; ?>
	<h4><?php echo $_SESSION['name']; ?> さんログイン中</h4>
	<form action="<?php echo $this->Html->url('/Posts/add');  ?>"method="POST">
	<div class="red"><h2>ツイートしてください</h2></div><h4>(50文字以上)</h4><br/>
	<textarea rows="10" cols="60" input type="text" id="form-content-text" name="message">
	<?php if(isset($reply_data)==true){
		echo $reply_data[0]['Post']['user_name'];
		echo 'さん';
		echo $reply_data[0]['Post']['message']; 
	}
	?></textarea>
	<p id="form-content-text2">0文字</p>
	<script type="text/javascript"><!--
		 	document.getElementById('form-content-text').addEventListener('keyup',function(){
		  	console.log (this);
		  	var value2 = this.value ;
			console.log (value2);
			ShowLength(value2);
			});
			 function ShowLength( str ) {
			 	 document.getElementById("form-content-text2").innerHTML = str.length + "文字";
			   }
	</script>
<?php if(isset($reply_data)==true){ ?>
 <input type="hidden" name="reply_post_id" value="<?php echo $reply_data[0]['Post']['id']; ?> ">
<?php }else{ ?>
<input type="hidden" name="reply_post_id" value="0">
<?php } ?>
<input type="submit" value="投稿"></form><br/>


<div class="col-md-4" style="border-bottom: 1px solid #EEEEEE">
<a href="<?php echo '/Posts/index/';?>">ツイート</a><br>
</div>
<div class="col-md-4" style="border-bottom: 1px solid #EEEEEE">
<a href="<?php echo '/Followers/index/';?>">フォロー</a><br>
</div>
<div class="col-md-4" style="border-bottom: 1px solid #EEEEEE">
<a href="<?php echo '/Followers/show/'; ?>">フォロワー</a><br>
</div><br> 
	<h3>ツイート</h3><br/>
<?php foreach ($posts_data as $row): ?>
	<div id="post_contents">
		<section>
			<article class="articleList">
				<table>
					<tr>
					<td>
					<?php echo $row['Post']['user_image'];?><br>
					<?php echo $row['Post']['message'];?><br>
					<?php echo $row['Post']['user_name'];?>さん<br>
					<?php echo $row['Post']['created'];?><br>
					<form action="<?php echo $this->Html->url('/Posts/index');  ?>"method="POST">
					<input type="hidden" name="reply" value="<?php echo $row['Post']['id']; ?>" size="40"><br/>
					<input type="submit" value="返信"><br/>
					</td>
					</tr>
				</table>
			</article>
		</section>
	</div>
<?php endforeach; ?>

