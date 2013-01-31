<?php
namespace app\controllers;

session_start();

use app\models\Users;
use app\models\Hows;
use app\models\Whats;

use lithium\security\Auth;
use lithium\g11n\Message;
use lithium\storage\Session;

class AdminController extends \lithium\action\Controller
{
	public function index()
	{
		if($_SESSION['loginSuccess'] != 1)
		return $this->redirect('Login::login');
	}

	public function manage()
	{
		$msg = '';
		if($_SESSION['loginSuccess'] != 1)
			return $this->redirect('Login::login');
	
		if(isset($_SESSION['role']) && $_SESSION['role'] != 'admin' )
		{
			return $this->redirect('User::index');
		} 
		else 
		{
			$temp = $this->request->data;
			if($temp['email'] != null || $temp['email'] != "") 
			{
			  // var_dump($temp);
			  // $users = Users::first(array('conditions' => 'user_email'=>$temp['user_email']));
			  $users = Users::first(array('conditions' => array('email'=>$temp['email'])));
				if(isset($users) && $users['email']==$temp['email']) {
					unset($_SESSION['tempuserEmail']);
					unset($_SESSION['tempuserId']);
					$msg = 'User with email id '. $temp['email']. ' already exists!';
					return compact('msg');
					//return "Error: User with email id ".$temp['email']." already exists";
				} else {
					$random = substr(number_format(time() * rand(),0,'',''),0,10);
					$temp['uniqueno'] = $random;///substr($temp['user_email'],0,strpos($temp['user_email'],'@'))
					$temp['roles']=array(array('value'=>$temp['roles']));
					$adm = Users::create($temp);
					if($adm->save()) {
						$msg = 'success';
					} else $msg = 'Unable to save user!';
						//return $this->redirect('Admin::manage');
					return compact('msg','random');
				}
			}
		}
	}

   public function success()
	{
		if($_SESSION['loginSuccess'] != 1)
		return $this->redirect('Login::login');

	}

	public function addInterests(){
		if($_SESSION['role'] != "admin")
		{
			return $this->redirect('User::profile');
		}
		$args = $this->request->params['args'];
		return compact('args');
	}

	public function getHows(){
		$hows = Hows::getHows('all',array('conditions' => array('status' => '1')));
		$howsArray = array();

		foreach($hows as $how)
		{
			array_push($howsArray,array('name' => $how['name'],'id' => $how['_id']));
		}

		return json_encode($howsArray);
	}

	public function getWhats(){
		$whats = Whats::getWhats('all',array('conditions' => array('status' => '1')));
		$whatsArray = array();

		foreach($whats as $what)
		{
			array_push($whatsArray,array('name' => $what['name'],'id' => $what['_id']));
		}

		return json_encode($whatsArray);
	}
	
	public function getWhichs(){
		$whatName = $_POST['whatname'];
		$whats = Whats::getWhats('all',array('conditions' => array('name' => $whatName,'status' => '1','whichs' => array('$elemMatch' => array('status' => '1'))), 'fields' => array('whichs')));
		$whichsArray = array();

		foreach($whats as $what)
		{
			foreach($what['whichs'] as $which)
			{				
					if($which['status'] != "0")
					array_push($whichsArray,array('id' => $what['_id'],'name' => $which['name']));				
			}
			
		}

		return json_encode($whichsArray);
	}

	public function deleteHow(){
		$howId = $_POST['id'];
		$result = Hows::updateHow(array('status' => '0'),array('_id' => new \MongoId($howId)));
		if($result)
		{
			return '1';
		}
		else
		{
			return '0';
		}
	}

	public function deleteWhat(){
		$whatId = $_POST['id'];
		$result = Whats::updateWhat(array('status' => '0'),array('_id' => new \MongoId($whatId)));
		if($result)
		{
			return '1';
		}
		else
		{
			return '0';
		}
	}
	
	public function deleteWhich(){
		$whatId = $_POST['id'];
		$whichName = $_POST['name'];
		$result = Whats::updateWhat(array('whichs.$.status' => '0'),array('_id' => new \MongoId($whatId),'whichs' => array('$elemMatch' => array('name' => $whichName))));
		if($result)
		{
			return '1';
		}
		else
		{
			return '0';
		}
	}

	public function createHow(){
		$howName = $_POST['name'];
		$result = Hows::create(array('name' => $howName,'status' => '1'))->save();

		if($result)
		{
			return '1';
		}
		else
		{
			return '0';
		}
	}

	public function createWhat(){
		$whatName = $_POST['name'];
		$result = Whats::create(array('name' => $whatName,'status' => '1','whichs' => array()))->save();

		if($result)
		{
			return '1';
		}
		else
		{
			return '0';
		}
	}

	public function editWhat(){
		$whatName = $_POST['name'];
		$id = $_POST['id'];
		$result = Whats::updateWhat(array('name' => $whatName),array('_id' => new \MongoId($id)));

		if($result)
		{
			return '1';
		}
		else
		{
			return '0';
		}
	}

	public function editHow(){
		$howName = $_POST['name'];
		$id = $_POST['id'];
		$result = Hows::updateHow(array('name' => $howName),array('_id' => new \MongoId($id)));

		if($result)
		{
			return '1';
		}
		else
		{
			return '0';
		}
	}
	
	public function editWhich(){
		$whatId = $_POST['id'];
		$whichName = $_POST['name'];
		$whichOldName = $_POST['oldName'];
		$result = Whats::updateWhat(array('whichs.$.name' => $whichName),array('_id' => new \MongoId($whatId),'whichs' => array('$elemMatch' => array('name' => $whichName))));
		if($result)
		{
			return '1';
		}
		else
		{
			return '0';
		}
	}
	
	public function createWhich(){
		$whichName = $_POST['name'];
		$whatName = $_POST['whatname'];
		$result = Whats::updateWhat(array('$push' => array('whichs' => array('name' => $whichName,'status' => '1'))), array('name' => $whatName));

		if($result)
		{
			return '1';
		}
		else
		{
			return '0';
		}
	}
	
}


?>

