<nav class="navbar navbar-default navbar-fixed-top navbar-invisible">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-offset-1 col-xs-10">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"></a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<?php if(!empty($user)): ?>
							<li><a href="/"><?php echo h($user['username']); ?>さん</a></li>
							<li><?php echo $this->Html->link('LOGOUT', array('controller' => 'users', 'action' => 'logout')); ?></li>
							<li><?php echo $this->Html->link('Add Category', array('controller' => 'categories', 'action' => 'add')); ?></li>
							<li><?php echo $this->Html->link('New Topic', array('controller' => 'topics', 'action' => 'add')); ?></li>
						<?php else: ?>
							<li class="login_form"><?php echo $this->Html->link('ログイン', array('controller' => 'users', 'action' => 'login')); ?></li>
							<li class="sign_up_form"><?php echo $this->Html->link('新規登録', array('controller' => 'users', 'action' => 'add')); ?></li>
							<li class="login_form"><?php echo $this->Html->link('ログアウト', array('controller' => 'users', 'action' => 'logout')); ?></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>