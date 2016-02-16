
<h2>スタッフログイン画面</h2><br>
<form action="<?php echo $this->Html->url('/Staffs/login');  ?>"method="POST">

<h2>スタッフ名</h2>
<input type="text" name="name" size="30"><br/>
<h2>パスワード</h2>
<input type="password" name="password" size="30"><br/><br/>
<input type="submit" value="ログイン"></form><br/>
