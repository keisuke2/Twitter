
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Bootstrap 101 Template</title>

    
    <link href="css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>

 
    <nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="../Users/add">会員登録 <span class="sr-only">(current)</span></a></li>

        <li class="active"><a href="../Users/login">ログイン<span class="sr-only">(current)</span></a></li>

        <li class="active"><a href="../Users/logout">ログアウト<span class="sr-only">(current)</span></a></li>

</ul>
      
<form action="<?php echo $this->Html->url('/Companies/check');  ?>"method="POST">
<input type="text" name="name"  placeholder="企業名を入力してください" style="width:200px">
<input type="submit" value="検索"></form><br/>





     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




<div class="container">
  <h1>面接いただきBOX</h1><br/>

  <p>就職活動...それは将来を決める大切な活動</p>
  <h3>なぜ (why japanese people!!)</h3>
  <p>大学受験では大学別の赤本があるのにもかかわらず就職活動では企業別の対策本がないのか！！</p>
  <p>就活生向けのSNSサービスとかあるけど本当に知りたい情報ぜんぜんねええええええ！！</p>
  <p>ないならばみんなで作ればいい！！</p>
  <p>このサービスは私が就活生だった頃に感じた課題感から作りました。</p>
  <br/>

  <h4>■【サービス概要】</h4>
 <p>すでに内定をもらった企業、もしくはもう落選してしまった企業の面接での内容を投稿することで企業別の投稿内容が見えます。また就活生が投稿した他社の面接情報もしく投稿した人に対して質問をすることができます。</p>
 <h4>-メリット</h4>
 <p>投稿者・質問に対する回答者にメリットを与える仕組みを作り出すことで就活生が本当に知りたい情報がてに入ります</p>
 <p>面接で聞かれた内容やみられている視点、先行フェーズ等を書き込んでください</p>
 <p>みんなで協力し夢・内定を勝ち取りましょう！</p><br/>
 <p>＊注：就活生のみ利用可能なサイトで名前はニックネームで表示されます。安心してご利用下さい。</p>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>