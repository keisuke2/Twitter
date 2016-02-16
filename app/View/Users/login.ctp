
<form action="<?php echo $this->Html->url('/Users/login');  ?>"method="POST">

<h2>メールアドレス</h2>
<input type="text" name="email" size="30"><br/>
<h2>パスワード</h2>
<input type="password" name="password" size="30"><br/><br/>
<input type="checkbox" name="save" id="save" value="on"/><label for="save">IDを保存する</label><br>


<input type="submit" value="ログイン"></form><br/>

<a href="/Users/add">会員登録画面へ</a></br>
<a href="/Users/email">パスワードをお忘れの方へ</a><br/>
<a href="/Users">TOPへ</a></br>
<?php  $this->element('analyticstracking');?>