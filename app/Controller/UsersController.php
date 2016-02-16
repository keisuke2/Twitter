<?php


App::uses('CakeEmail','Network/Email');

class UsersController extends AppController
{
	public function index()
	{

	}
	public function login()
	{
		//cookieでブラウザにidを保持させる
		/*
		if(isset($_POST['save'])==true)
		{
			$save =$_POST['save'];
		if($save=='on'){
			setcookie('email',$this->request->data['email'],time() +60*60*24*14);
		}
		else
		{
			setcookie('email','');
		}
		}
		*/		
		if($this->request->is('post'))
		{
			//idを保存する　エラー出る可能性あり。
			if(isset($this->request->data['save'])==true)
			{
				$save =$this->request->data['save'];
				if($save=='on'){
					setcookie('email',$this->request->data['email'],time() +60*60*24*14);
					
				}
				else
				{
				setcookie('email','');
	
				}	
			}
			$options=array(
			'conditions'=>array(
				'email'=>$this->request->data['email'],
				'password'=>$this->request->data['password']
				)
				);
		//データベースのなかのusernameとpasswordを引っ張ってくる
		//もし引っ張ってきた値と入力した値が一致したらログイン成功
		$user_data= $this->User->find('all',$options);
		if($user_data==false)
		{
			$this->Session->setFlash(
					'username or password is incorrect'
					);
			$this->redirect('login');
		}else{
		session_start();
		$_SESSION['login']=1;
		$_SESSION['user_id']=$user_data[0]['User']['id'];
		$_SESSION['name']=$user_data[0]['User']['name'];
		if($user_data[0]['User']['image']=='')
		{

		}else{
			//var_dump($user_data[0]['User']['image']);
			$user_image=$user_data[0]['User']['image'];
			$disp_image='<img src="../webroot/user_picture/'.$user_image.'">';
			$_SESSION['image']=$disp_image;

		}
		$this->set('user_data',$user_data);
		$this->redirect('/Posts/index');
		}
	}
}
	public function logout()
	{
	
	}
	public function add()
	{
		if($this->request->is('post')){
			if($this->request->data['email']==null||$this->request->data['name']==null||$this->request->data['password']==null||$this->request->data['password2']==null)
			{
				$this->Session->setFlash('正しく入力してください！');
				$this->redirect('add');
			}
			//画像をアップロードする。
			$fileName =$this->params['form']['image'];
			if($fileName['size']>0)
			{
				if($fileName['size']>1000000)
				{
					echo '画像サイズが大き過ぎます';
				}
				else
				{
					move_uploaded_file($fileName['tmp_name'],'../webroot/user_picture/'.$fileName['name']);
				}
			}
			$options=array(
			'conditions'=>array(
				'email'=>$this->request->data['email']
				)
			);
			//データベースのなかのusernameとpasswordを引っ張ってくる
			//もし引っ張ってきた値と入力した値が一致したらログイン成功
			$user_data= $this->User->find('all',$options);
			if($user_data==true)
			{
				$this->Session->setFlash(
					'そのメールアドレスはすでに使われています。'
					);
				$this->redirect('add');
			}else{
					$data=array(
					'email'=>$this->request->data['email'],
					'name'=>$this->request->data['name'],
					'password'=>$this->request->data['password'],
					'image'=>$fileName['name']
					);
					$this->User->save($data);
					$this->Session->setFlash('会員登録しました！');
					$this->redirect('login');
			}
		}

	}
	public function email()
	{
			if($this->request->is('post'))

			{

			if($this->request->data['email']==null||$this->request->data['password']==null||$this->request->data['password2']==null)
			{
						$this->Session->setFlash('正しく入力してください！');
						$this->redirect('email');
				}
			$options=array(
			'conditions'=>array(
				'email'=>$this->request->data['email']
				)

				);
			$user_data= $this->User->find('all',$options);
			if($user_data==false)
			{
				$this->Session->setFlash(
					'そのようなメールアドレスは登録されていません。'
					);
				$this->redirect('email');
			}
			else
			{
				   $data=array(
					'id'=>$user_data[0]['User']['id'],
					'email'=>$this->request->data['email'],
					'password'=>$this->request->data['password']
					);
			$this->User->save($data);
					$this->Session->setFlash('パスワードを再設定しました！');
					$this->redirect('login');
			}
		}		
	}
	public function search()
	{
		if($this->request->is('post')){
			$options = array(
			'conditions'=>array(
    		'User.name LIKE' =>$this->request->data['name']."%",//入力した文字が含まれる企業を表示させる。
			));
			//var_dump($options);
			$user_list=$this->User->find('all',$options);
			$this->set('user_list',$user_list);
			//}
		}

	}

}

?>