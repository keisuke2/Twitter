ユーザー一覧を表示してフォローボタンを作る

 <h3>おすすめユーザー</h3><br/>
<?php foreach ($no_follow_user_data as $row): ?>
	<div id="post_contents">
		<section>
			<article class="articleList">
				<table>
					<tr>
					<td>
					<?php echo $row['User']['name'];?>さん<br>
					<a href="<?php echo '/Followers/add/'.$row['User']['id']; ?>">フォローする</a>
					</td>
					</tr>
				</table>
			</article>
		</section>
	</div>
<?php endforeach; ?>

 <h3>フォロー</h3><br/>
<?php foreach ($follow_user_data as $key): ?>
	<div id="post_contents">
		<section>
			<article class="articleList">
				<table>
					<tr>
					<td>
					<?php echo $key['User']['name'];?>さん<br>
					<a href="<?php echo '/Followers/add/'.$key['User']['id']; ?>">フォロー中</a>
					</td>
					</tr>
				</table>
			</article>
		</section>
	</div>
<?php endforeach; ?>