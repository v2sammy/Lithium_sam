<?php

namespace app\controllers;

use app\models\Users;


class TestappController extends \lithium\action\Controller {
	
	public function index() {
	
	}
	

	
	public function transfers() {
		$options = array();
		$arguments = func_get_args();
		if($arguments === array('page2')){
			$path = array('page2');
			$users = Users::getUsers();	
					
		}			
		else
			$path = array('defaultpage');
		$options['data']=compact('users');
		$options['template'] = join('/', $path);
		return $this->render($options);
	}
}


?>
