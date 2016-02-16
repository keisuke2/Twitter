

<form action="<?php echo $this->Html->url('/Users/email');  ?>"method="POST">
<h3>メールアドレスを入力してください</h3>
<input type="text" name="email"><br/>
<h3>新たなパスワードを入力してください。</h3>
<input type="password" name="password" size="40"><br/>
<h3>もう一度パスワードを入力してください。</h3>
<input type="password" name="password2"><br/>
<p><input type="submit" value="登録"></p><br/>
<a href="/Users">TOPへ</a></br>
<?php $this->element('analyticstracking');?>