<form action="<?php echo $this->Html->url('/Users/add');  ?>"method="POST" enctype="multipart/form-data">
<h2>新規会員登録</h2><br/>
<h3>ニックネーム</h3>
<input type="text" name="name" size="40"><br/>
<h3>メールアドレスを入力してください</h3>
<input type="text" name="email"><br/>
<h3>パスワード</h3>
<input type="password" name="password" size="40"><br/>
<h3>もう一度パスワードを入力してください</h3>
<input type="password" name="password2"><br/>
<h3>プロフィール画像(任意)</h3>
<input type="file" name="image" style="width:400px">
<p><input type="submit" value="登録"></p><br/>
<a href="/Users">TOPへ</a>
</form><br/>
<?php echo $this->element('analyticstracking');?>


