<?php
namespace app\controllers;
session_start();

use app\models\Users;
use app\models\How;
use app\models\What;
use app\models\Which;
use app\models\Where;


use lithium\security\Auth;

use lithium\g11n\Message;
use lithium\storage\Session;
use lithium\security\Password;

class UserController extends \lithium\action\Controller {

	public function register()
	{
		if(isset($this->request->data['email'])) {
			$condition = array('_id'=>new \MongoId($_SESSION['tempuserId']));
			$this->request->data['password'] = Password::hash($this->request->data['password']);
			Users::update($this->request->data,$condition);
			unset($_SESSION['tempuserEmail']);
			unset($_SESSION['tempuserId']);
			$isRegistered = '1';
			return compact('isRegistered');  
			//return $this->redirect('User::success');
		}
		else
		{
			$uniqueno = substr($_SERVER['REQUEST_URI'],10);
			//var_dump($uniqueno);
			$tempuser = Users::first(array('conditions'=> array('uniqueno'=>$uniqueno)));
			$_SESSION['tempuserId'] = $tempuser['_id'];
			$_SESSION['tempuserEmail'] = $tempuser['email'];
			//var_dump($_SESSION['tempuserEmail']);
		}
		
	}
	public function updateInterests(){
	
	}
	
	public function addPartner()
	{
		$what = $_POST['what'];
		$date = $_POST['date'];
		$where = $_POST['where'];
		$how = $_POST['how'];
		$amount = $_POST['amount'];
		
		$result = Users::updateUser(array('$push'=>array('interests'=>array('what'=>$what, 'date'=>$date, 'where' => $where,'how'=>$how, 'amount'=>$amount))),array('email'=>$_SESSION['email'])); 
	}
	public function profile()
	{
		
	}
	public function partner()
	{
     	
	}
	public function provider()
	{
     	
	}
	public function enduser()
	{
     	
	}
	
	public function success()
	{
     	
	}
	

	public function index()
	{
		
	}
	public function getLink(){
		$email = $_POST['email'];
		$user = Users::getUsers('all', array('conditions' => array('email' => $email), 'fields' => array('uniqueno')));
		$uniqueno = $user[0]['uniqueno'];
		return json_encode(array('link' => $uniqueno));
	}

	public function forgot()
	{

		
	}
	

	public function participate()
	{
	}
	public function forgotpassword(){
	
	}
	
	public function updatePassword(){
		$password = Password::hash($_POST['password']);
		$uniqueId = $_POST['uniqueId'];
		$privatekey = "6Lcb8tsSAAAAAJcxKb5f0AzH2fvKx1zjnlFHPqon";
        $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  		if (!$resp->is_valid) {
    		// What happens when the CAPTCHA was entered incorrectly
    		
  		} 
  		else {
    		// Your code here to handle a successful verification
    		return "wrong";
    		
  		}
		$result = Users::updateUser(array('password' => $password),array('uniqueno' => $uniqueId));
		if($result)
			return '1';
		else
			return '0';
	}

}

?>
