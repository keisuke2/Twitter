<header>
	<div class="header_title">
		<p>Twitter</p>
	</div>
	 <div class="check_place">
		 <form action="<?php echo $this->Html->url('/Users/search');  ?>"method="POST">
		<input type="text" name="name"  placeholder="Twitterを検索する" style="width:90%">
		<input type="submit" value="検索" style="width:90%"></form>
	</div>
</header>