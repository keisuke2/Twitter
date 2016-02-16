<?php
session_start();//すでにコントローラーでスタートしてるからいらないみたい１!
session_regenerate_id(true);

class FollowersController extends AppController
{
	public $uses = array('Post','User','Follower');
	public function index()
	{
		
		//フォローしていないユーザーをおすすめユーザーとして表示させる
		$options1=array(
			'conditions'=>arraY(
				'user_id'=>$_SESSION['user_id']
				)
			);
		$follow_data=$this->Follower->find('all',$options1);
		$a=count($follow_data); //DBないの数を確認する
		//var_dump($a);
		for($i = 0 ; $i < $a; ++$i) { 
		$follow_id[]=$follow_data[$i]['Follower']['follow_user_id'];
		}
		//var_dump($follower_id);
		//follower_idの中にfollowerテーブルのfollow_user_idが配列であることを確認する
		$options2=array(
			'conditions'=>array(
				'NOT'=>array(
					'id'=>$follow_id 
					)
				)
			);
		//var_dump($options2);
		$no_follow_user_data=$this->User->find('all',$options2);
		$this->set('no_follow_user_data',$no_follow_user_data);


		//フォロー中のユーザを表示する
		$options=array(
			'conditions'=>arraY(
				'user_id'=>$_SESSION['user_id']
				)
			);
		$follow_data=$this->Follower->find('all',$options);
		//countでfollower内のデータを取得
		//for分wお使いデータの数だけループさせる
		//配列ないにすべてのidを格納する
		//そのidのユーザーデータを取得する
		$a=count($follow_data); //DBないの数を確認する
		//var_dump($a);
		for($i = 0 ; $i < $a; ++$i) { 
		$follow_id[]=$follow_data[$i]['Follower']['follow_user_id'];
	}
		//var_dump($follower_id);
		//follower_idの中にfollowerテーブルのfollow_user_idが配列であることを確認する
		$options=array(
			'conditions'=>arraY(
				'id'=>$follow_id //フォローしているユーザーと同じidを持つ人物をUSERテーブルから取得する
				)
			);
		$follow_user_data=$this->User->find('all',$options);
		$this->set('follow_user_data',$follow_user_data);
	}


	public function add(){
			$id=$this->request->pass[0];
			$data=array(
			'follow_user_id'=>$id,
			'user_id'=>$_SESSION['user_id']
			);
			$id=$this->Follower->save($data);
			$msg="フォローしました!";
			$this->Session->setflash($msg);
			$this->redirect('/Followers/index');
	}

	public function show(){
		//自分をフォローしてくれてるユーザーを表示する


//followerテーブルでfollow_idが自分と同じIDのユーザーidを取得する
		$data=array(
		'conditions'=>array(
		'follow_user_id'=>$_SESSION['user_id']
		)
		);


		$follower_data=$this->Follower->find('all',$data);//自分のidと同じfollow_user_idのデータを取得する
//idのみ取得したい

		$b=count($follower_data);

		for($i=0; $i<$b; ++ $i){
			$follower_id[]=$follower_data[$i]['Follower']['follow_user_id'];
		}

//そのユーザーidと一致するユーザーを取得し表示する。
		$options=array(
			'conditions'=>arraY(
				'id'=>$follower_id //フォローしているユーザーと同じidを持つ人物をUSERテーブルから取得する
				)
			);
		$follower_data=$this->User->find('all',$options);
		$this->set('follower_data',$follower_data);
	}

}

?>