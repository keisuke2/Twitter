<?php


session_start();//これがないと$_SESSIONが使えない!

session_regenerate_id(true);

class StaffsController extends AppController
{

	public $uses = array('Staff','Company','User','Point');

	public function index()
	{


	}



	public function add()
	{
		if($this->request->is('post')){

/*

			$options2=array(
			'conditions'=>array(
				'email'=>$this->request->data['email']
				)

				);

			$user_email= $this->User->find('all',$options2);
			var_dump($user_email);
			//もし既存のメールアドレスと一致していたらすでにあると表示
			if($user_email==false)
			{
*/
			

				if($this->request->data['name']==null||$this->request->data['password']==null||$this->request->data['password2']==null)
					{
						$this->Session->setFlash('正しく入力してください！');

				}else if($this->request->data['password']!==$this->request->data['password2'])
				{

					   $this->Session->setFlash('パスワードが一致しません');
				}else
				{
			
					$data=array(
					'name'=>$this->request->data['name'],
					'password'=>$this->request->data['password'],
					);
					$this->Staff->save($data);
		
					$this->Session->setFlash('スタッフ登録しました！');
					$this->redirect('login');

					}
/*
				
			}else
				{
				$this->Session->setFlash('そのメールアドレスはすでに登録されています。');



			}
*/


		}

	}





	public function login()
	{
		

		if($this->request->is('post'))
		{

		$options=array(
			'conditions'=>array(
				'name'=>$this->request->data['name'],
				'password'=>$this->request->data['password']
				)

				);
		//データベースのなかのusernameとpasswordを引っ張ってくる
		//もし引っ張ってきた値と入力した値が一致したらログイン成功

		$staff_data= $this->Staff->find('all',$options);
		if($staff_data==false)
		{
			$this->Session->setFlash(
					'name or password is incorrect'
					);
			$this->redirect('login');


		}else{

		
		
		session_start();
		$_SESSION['login']=1;
		//$_SESSION['staff_code']=$staff_code;
		$_SESSION['staff_name']=$staff_data[0]['Staff']['name'];
		//var_dump($_SESSION['username']);
		

		$this->set('staff_data',$staff_data);
		$this->render('/Staffs/index');


			}


		}
	}

	public function logout()
	{

		
	}
	public function staff_list()
	{

		if($this->request->is('post'))
		{

			if(isset($_POST['disp'])==true)
		{   
			if(isset($_POST['disp'])==false)
			{
				header('Location:staff_ng');
			}

			$staff_id=$_POST['id'];
			//$this->redirect('login');
			$this->header('Location:staff_disp?id='.$staff_id);
		}


		if(isset($_POST['add'])==true)
		{
			$this->header('Location:add');
		}

		if(isset($_POST['edit'])==true)
		{
			if(isset($_POST['id'])==false)
			{
			header('Location:staff_ng');
			}
			$staff_id=$_POST['id'];
			$this->header('Location:staff_edit?id='.$staff_id);
		}

		if(isset($_POST['delete'])==true)
		{
			if(isset($_POST['id'])==false)
			{
			header('Location:staff_ng.php');
			}
			$staff_id=$_POST['id'];
			$this->header('Location:staff_delete?id='.$staff_id);
		}

		}



		$staff_list= $this->Staff->find('all');
		$this->set('staff_list',$staff_list);




	}

	public function staff_ng()
	{

	}

	

	public function staff_disp()
	{
		//$staff_code=$this->request->pass[0];

		$options=array(
			'conditions'=>array(
				'id'=>$this->request->query['id']/*$staff_code*/)
				 );

		$staff_disp=$this->Staff->find('all',$options);

		$this->set('staff_disp',$staff_disp);



	}

	public function staff_edit()
	{
		if($this->request->is('post'))
		{
			

			$data=array(
				'id'=>$this->request->data['id'],
				'name'=>$this->request->data['name'],
				'password'=>$this->request->data['password']

				);
			$this->Staff->save($data);
			$msg="スタッフ情報を修正しました";

			$this->Session->setflash($msg);
			$this->redirect('staff_list');
		return;

		}


		$options=array(
			'conditions'=>array(
				'id'=>$this->request->query['id']/*$staff_code*/)
				 );

		$staff_edit=$this->Staff->find('all',$options);

		$this->set('staff_edit',$staff_edit);



	}
	public function staff_delete()
	{

		if($this->request->is('post'))
		{


			$this->Staff->delete($this->request->data('id'));


/*SQL文で削除を実行するにはどうしたらいいのか？
			
$id=$this->request->data['id'];

$dsn='mysql:dbname=jobhunt2;host=localhost';
$user='root';
$password='root';
$dbh= new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

	$sql='DELETE FROM staffs WHERE id=?';


$stmt=$dbh->prepare($sql);
$data[]=$id;
$stmt->execute($data);
*/
			$msg="スタッフ情報をしました";

			$this->Session->setflash($msg);
			$this->redirect('staff_list');
			return;
			
			/*
			$data=array(
				'id'=>$this->request->data['id'],
				'name'=>$this->request->data['name'],
				'password'=>$this->request->data['password']

				);
			$this->Staff->save($data);
			$msg="スタッフ情報をしました";

			$this->Session->setflash($msg);
			$this->redirect('staff_list');
			return;
			*/

		}





		$options=array(
			'conditions'=>array(
				'id'=>$this->request->query['id']/*$staff_code*/)
				 );

		$staff_delete=$this->Staff->find('all',$options);

		$this->set('staff_delete',$staff_delete);

	}



	public function company_list()
	{

		if($this->request->is('post'))
		{

			if(isset($_POST['disp'])==true)
		{   
			if(isset($_POST['disp'])==false)
			{
				header('Location:company_ng');
			}

			$company_id=$_POST['id'];
			//$this->redirect('login');
			$this->header('Location:company_disp?id='.$company_id);
		}


		if(isset($_POST['add'])==true)
		{
			$this->header('Location:company_add');
		}

		if(isset($_POST['edit'])==true)
		{
			if(isset($_POST['id'])==false)
			{
			header('Location:company_ng');
			}
			$company_id=$_POST['id'];
			$this->header('Location:company_edit?id='.$company_id);
		}

		if(isset($_POST['delete'])==true)
		{
			if(isset($_POST['id'])==false)
			{
			header('Location:company_ng.php');
			}
			$company_id=$_POST['id'];
			$this->header('Location:company_delete?id='.$company_id);
		}

		}



		$company_list= $this->Company->find('all');
		$this->set('company_list',$company_list);
	}

	public function company_disp()
	{
		//$staff_code=$this->request->pass[0];

		$options=array(
			'conditions'=>array(
				'id'=>$this->request->query['id']/*$staff_code*/)
				 );

		$company_disp=$this->Company->find('all',$options);

		$this->set('company_disp',$company_disp);



	}


	public function company_add()
	{
		if($this->request->is('post')){

			$name=array(
				'name'=>$this->request->data['name'],
				'url'=>$this->request->data['url'],

				);


			$this->Company->save($name);
		
			$this->Session->setFlash('企業を追加しました。');
			$this->redirect('company_list');
		
			

		}
	}


	public function company_edit()
	{
		if($this->request->is('post'))
		{
			

			$data=array(
				'id'=>$this->request->data['id'],
				'name'=>$this->request->data['name'],
				'url'=>$this->request->data['url'],
				'user_id'=>$this->request->data['user_id'],

				);
			$this->Company->save($data);
			$msg="企業情報を修正しました";

			$this->Session->setflash($msg);
			$this->redirect('company_list');
		return;

		}


		$options=array(
			'conditions'=>array(
				'id'=>$this->request->query['id']/*$staff_code*/)
				 );

		$company_edit=$this->Company->find('all',$options);

		$this->set('company_edit',$company_edit);



	}

	public function company_delete()
	{

		if($this->request->is('post'))
		{


			$this->Company->delete($this->request->data('id'));



			$msg="企業情報を削除しました!";

			$this->Session->setflash($msg);
			$this->redirect('company_list');
			return;

		

		}


		$options=array(
			'conditions'=>array(
				'id'=>$this->request->query['id']/*$staff_code*/)
				 );

		$company_delete=$this->Company->find('all',$options);

		$this->set('company_delete',$company_delete);

	}



	public function user_list(){

		
		if($this->request->is('post'))
		{

			if(isset($_POST['disp'])==true)
		{   
			if(isset($_POST['disp'])==false)
			{
				header('Location:user_ng');
			}

			$user_id=$_POST['id'];
			//$this->redirect('login');
			$this->header('Location:user_disp?id='.$user_id);
		}


		if(isset($_POST['add'])==true)
		{
			$this->header('Location:add');
		}

		if(isset($_POST['edit'])==true)
		{
			if(isset($_POST['id'])==false)
			{
			header('Location:user_ng');
			}
			$user_id=$_POST['id'];
			$this->header('Location:user_edit?id='.$user_id);
		}

		if(isset($_POST['delete'])==true)
		{
			if(isset($_POST['id'])==false)
			{
			header('Location:user_ng.php');
			}
			$user_id=$_POST['id'];
			$this->header('Location:user_delete?id='.$user_id);
		}

		}



		$user_list= $this->User->find('all');
		$this->set('user_list',$user_list);

	}
		public function user_disp()
	{
		//$staff_code=$this->request->pass[0];

		$options=array(
			'conditions'=>array(
				'id'=>$this->request->query['id']/*$staff_code*/)
				 );

		$user_disp=$this->User->find('all',$options);

		$this->set('user_disp',$user_disp);

	}
	public function user_edit()
	{
		if($this->request->is('post'))
		{
			

			$data=array(
				'id'=>$this->request->data['id'],
				'nick_name'=>$this->request->data['nick_name'],
				'uni_name'=>$this->request->data['uni_name']
				);
			$this->User->save($data);


			$data2=array(
				'id'=>$this->request->data['id'],
				'point'=>$this->request->data['point']

				);
			$this->Point->save($data2);
			$msg="ユーザーを修正しました";

			$this->Session->setflash($msg);
			$this->redirect('user_list');

		}



		$options=array(
			'conditions'=>array(
				'id'=>$this->request->query['id']/*$staff_code*/)
				 );

		$user_edit=$this->User->find('all',$options);

		$this->set('user_edit',$user_edit);


		$options2=array(
			'conditions'=>array(
				'user_id'=>$this->request->query['id']/*$staff_code*/)
				 );

		$point_edit=$this->Point->find('all',$options2);

		$this->set('point_edit',$point_edit);



	}

	public function user_delete()
	{

		if($this->request->is('post'))
		{


			$this->User->delete($this->request->data('id'));



			$msg="ユーザーを削除しました!";

			$this->Session->setflash($msg);
			$this->redirect('user_list');
			return;
		}

		$options=array(
			'conditions'=>array(
				'id'=>$this->request->query['id']/*$staff_code*/)
				 );

		$user_delete=$this->User->find('all',$options);

		$this->set('user_delete',$user_delete);

	}

	public function score_update(){

		if($this->request->is('post'))
		{
			$user_list=$this->Point->find('all');

			$a=count($user_list); //DBないの数を確認する
			//var_dump($a);
			for($i = 0 ; $i < $a; ++$i) {  //DBないの数だけ下記のコマンドを実行する。
			$options=array(
			'id'=>$user_list[$i]['Point']['id'],
			'point'=>$user_list[$i]['Point']['point']-1 //idをひとつづつ指定する。
			);
			$this->Point->save($options);
			}
			$msg="日付を-1しました。";
			$this->Session->setflash($msg);
		}
	}

}

?>