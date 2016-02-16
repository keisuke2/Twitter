<div>
	<div id="top_index"> 
				<div id="pageBody">
				<img src="/img/web_top_logo.png" style="width:300px" />
			<h3>メリット</h3>
				<div>
				 	<section class="portfolioIndex">
						<div class="col-md-4" style="border-bottom: 1px solid #EEEEEE">
							<p>Web系を中心とした企業の質問内容が見れる!</p>
							 <form action="<?php echo $this->Html->url('/Companies/show');  ?>"method="GET">
							<input type="submit" value="掲載企業を確認する" style="width:90%"></form><br>
						</div>
						<div class="col-md-4" style="border-bottom: 1px solid #EEEEEE">
							<p>たった50文字の面接内容を投稿するだけで企業の面接内容が見放題!<p>
						</div>
						<div class="col-md-4" style="border-bottom: 1px solid #EEEEEE">
							<p>日数制限機能により良質な面接内容が自然と集まる。</p><br>
						</div>
					</section>
				</div>
			<h3>使い方</h3>
						<section class="portfolioIndex">
						<div class="col-md-4" style="border-bottom: 1px solid #EEEEEE">
							<p class="step">STEP 1</p>
							<p>面接での質問内容を投稿する。<br>たった50文字!</p>
						</div>
						<div class="col-md-4" style="border-bottom: 1px solid #EEEEEE">
							<p class="step">STEP 2</p>
							<p>自分が受ける企業の質問内容を知る<br>面接での質問を投稿するたびに15日間延長！</p>
						</div>
						<div class="col-md-4" style="border-bottom: 1px solid #EEEEEE">
							<p class="step">STEP 3</p>
							<p>質問内容を見て準備する。<br> 万全の状態で思いを伝え内定を手にいれる！</p>
						</div>
					</section>
				</div><br> 
		<h3>登録はこちら(15秒程度)</h3>
		 <form action="<?php echo $this->Html->url('/users/add');  ?>"method="GET">
		<input type="submit" value="新規登録する" style="width:300px"></form>
	</div> 
	<?php //echo $this->element('aside'); ?>
</div>
<?php echo $this->element('analyticstracking');?>

