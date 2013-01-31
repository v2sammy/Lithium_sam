<?php
namespace app\controllers;
session_start();

use app\models\Users;
use app\models\Whats;
use app\models\Hows;


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
		if(!isset($_SESSION['what_list'])) {
			// retrieve what list
			$whats = Whats::find('all',array('conditions'=>array('status'=>'1'),'fields'=>array('_id','name')));
			$_SESSION['what_list'] = $whats;
		} else $whats = $_SESSION['what_list'];
		
		if(!isset($_SESSION['how_list'])) {
			// retrieve what list
			$hows = Hows::find('all',array('conditions'=>array('status'=>'1')));
			$_SESSION['how_list'] = $hows;
		} 
		else $hows = $_SESSION['how_list'];
		return compact('whats','hows');
	}
	
	public function getWhereWhich() {
		$arrVal = array();
		$whichsArray = array();
		$wheresArray = array();
		if(isset($_POST['id'])) {
			$whats = Whats::find('all',array('conditions'=>array('status'=>'1','_id'=>new \MongoId($_POST['id'])), 'fields'=>array('wheres','whichs')));
			foreach($whats as $what) {
				foreach($what['wheres'] as $where) {
					if($where['status']!="0") {
						array_push($wheresArray,array('id'=>$where['_id'],'name'=>$where['name']));
					}
				}
				foreach($what['whichs'] as $which) {
					if($which['status']!="0") {
						array_push($whichsArray,array('id'=>$which['_id'],'name'=>$which['name']));
					}
				}
			}
		}
		$arrVal['whichs'] = $whichsArray;
		$arrVal['wheres'] = $wheresArray;
		return json_encode($arrVal);
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
