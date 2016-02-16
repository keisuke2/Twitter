フォロワー覧を表示してフォローボタンを作る

 <h3>フォロワー</h3><br/>
<?php foreach ($follower_data as $row): ?>
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