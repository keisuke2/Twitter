<?php



session_start();
session_regenerate_id(true);
/*
if(isset($_SESSION['login'])==false)
{
	echo'ログインされていません。<br/>';
	echo '<a href="../Users/login">ログイン画面へ</a>'; 

	exit();
}
*/
class CompaniesController extends AppController
{

	public $scaffold;
	public function index()
	{
		//からのフォームを表示する画面
		$this->render('index');
	}

	public function check()
	{

		if($this->request->is('post')){
			$options = array(
			'limit'=>1 ,
			'conditions'=>array(
    		'Company.name LIKE' => "%".$this->request->data['name']."%",//入力した文字が含まれる企業を表示させる。
			));
			//var_dump($options);
			$companies_data=$this->Company->find('all',$options);
			//var_dump($companies_data[0]['Company']['name'])
/*
			if($companies_data=='')
			{
				$this->redirect('add');
			}else{
*/			
			$this->set('companies_data',$companies_data);
			//}
		}
    
	}
	public function add()
	{
		if($this->request->is('post')){

			$options=array(
			'conditions'=>array(
				'name'=>$this->request->data['name']
				)

				);
			$company_data= $this->Company->find('all',$options);

			if($company_data==true)
			{
				$this->Session->setFlash(
					'その企業はすでに登録されています。'
					);
				$this->redirect('add');
			}else
			{
				$name=array(
				'name'=>$this->request->data['name']

				);
			$this->Company->save($name);
			$this->Session->setFlash('企業を追加しました。');
			$this->redirect('index');
			}

		}
	}

	public function show(){
		$options=array(
			'conditions'=>array(
				'user_id'=>1/*$staff_code*/)
				 );
		$show_companies= $this->Company->find('all',$options);
		$this->set('show_companies',$show_companies);
	}

	


}




?>