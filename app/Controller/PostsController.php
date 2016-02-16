<?php
session_start();//すでにコントローラーでスタートしてるからいらないみたい１!
session_regenerate_id(true);

class PostsController extends AppController
{
	public $uses = array('Post','User');
	public $paginate=array(
		'limit'=>10 ,
		'order'=>array(
			'Post.created'=>'DESC',
			),
		'conditions'=>array(
			'Post.id <'=>300,
			)
		);
	public function index()
	{
		//データベースにアクセスしpostの内容を呼び出す
		//ビューで表示させる
		if($this->request->is('post')){
			$options=array(
			'conditions'=>array(
				'id'=>$this->request->data['reply']
				)
			);
			$reply_data=$this->Post->find('all',$options);
			//var_dump($reply_data);
			$this->set('reply_data',$reply_data);
			$posts_data=$this->Post->find('all');
			$this->set('posts_data',$posts_data);
		}else{
			$posts_data=$this->Post->find('all');
			$this->set('posts_data',$posts_data);
		}
	}
	public function add()
	{
		if($this->request->is('post')){
		if(strlen($this->request->data['message'])<50)
		{
			$msg2="投稿内容は50文字以上で入力してください";
			$this->Session->setflash($msg2);
			$this->redirect('/Posts/index');
			return;
		}else{
			$data=array(
			'message'=>$this->request->data['message'],
			'user_name'=>$_SESSION['name'],
			'user_image'=>$_SESSION['image'],//postのメンバーnameをニックネームに変えたら他の場所も大変になるのかな？2つ作っといたほうがいいかも。
			'reply_post_id'=>$this->request->data['reply_post_id']
			);	
			$id=$this->Post->save($data);
			$msg="ツイートしました!";
			$this->Session->setflash($msg);
			$this->redirect('/Posts/index');
			return;
			}
		}

	}

}

?>