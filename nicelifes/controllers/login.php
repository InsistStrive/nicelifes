<?php
/*
 * Created on 2016-7-6
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class login extends CI_Controller{
	public function __construct()
		{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->helper('url_helper');
		}
	public function view($login ='welcome_message'){
		if ( ! file_exists(APPPATH.'/views/'.$login.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$data['title'] = ucfirst($login); // Capitalize the first letter
		
		$this->load->view('templates/header', $data);
		$this->load->view($login, $data);
		$this->load->view('templates/footer', $data);
		
	}
	
	
	public function login($account,$pass)
		{
		//		if ( ! file_exists(APPPATH.'/views/'.'login.php'))
		//		{
		//			// Whoops, we don't have a page for that!
		//			show_404();
		//		}
		//        $datas['code'] = 0;
		//        $datas['succesed']=true;
		//        $datas['msg']= array('1','qq','q');
		//		$datas["data"] = $this->login_model->validate(iconv("GB2312","UTF-8","ÓÀ²»ÑÔÆú"),'123456');
		//		echo json_encode($datas);
		//$account=mb_convert_encoding($account, 'GB2312', 'UTF-8'); 
		$account=urldecode($account);
		//echo $account;
		$account_pass=$this->login_model->validate($account);
		//echo md5($pass,false);
		//echo "<br/>";
		//echo $account_pass['passwd'];
		$msssages = array();
		if(md5($pass,false)==$account_pass['passwd']){
			$msssages['code']=0;
			$msssages['succed']=true;
			$msssages['msg']='password true';
			echo json_encode($msssages);
			return true;
		}else{
			$msssages['code']=1;
			$msssages['succed']=true;
			$msssages['msg']='password false';
			echo json_encode($msssages);
			return false;
		}
		}
}
?>
