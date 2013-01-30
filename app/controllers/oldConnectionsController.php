<?php
namespace app\controllers;

use app\models\Users;
use \lithium\data\connections;

class ConnectionsController extends \lithium\action\Controller {

	protected function _init() {
        $this->_render['negotiate'] = true;
        parent::_init();
    }	
	
	
	public function search(){
		if($this->request->data){
			$reqData = $this->request->data;
			$searchName = $reqData['name'];	
			$regexObj = new \MongoRegex("/^$searchName/i");				
			$users = Users::find('all',array('conditions' => array('name' => $regexObj)));
			return compact('users');
		}
		else{
		
		}
	}
	
	public function connect(){
		$id = $_POST['id'];
		$query = array(
		'$push' => array(
			'connections' => array('id' => $id))
		);		
		$condition = array('_id' => "50f69176904e1d66affec20d");		
		$result = Users::update($query,$condition, array('atomic' => false));
		
		if($result){
			return '1';
		}
		else
		{
			return '0';
		}	
		
	}
	
	
	public function connections(){
		$myId = "50f69176904e1d66affec20d";
		$connections = Users::find('all',array('conditions' => array('_id' => $myId),'fields' => array('connections.id')));
		$i = 0;
		$userCursor = array();
		foreach($connections as $friends){
			foreach($friends['connections'] as $connection){
				array_push($userCursor,Users::find('all',array('conditions' => array('_id' => $connection['id']))));
			}
		}
		return compact('userCursor');
	}
	
	public function creategroup(){
		$groupName = $_POST['group'];
		$query = array(
			'$push' => array('connections' => array('group' => $groupName, 'users' => array()))
		);		
		$condition = array('_id' => "50f69176904e1d66affec20d");		
		$result = Users::update($query,$condition, array('atomic' => false));
		if($result)
			$this->redirect('Connections::getGroups');
		else
			return '0';	
		
	}
	
	public function getGroups(){
		$myId = "50f69176904e1d66affec20d";
		$connections = Users::find('all',array('conditions' => array('_id' => $myId),'fields' => array('connections.group')));
		$i = 0;
		$groupCursor = array();
		foreach($connections as $groups){
			foreach($groups['connections'] as $connection){		
				if($connection['group'])						
					array_push($groupCursor, $connection['group']);
			}
		}
		return json_encode($groupCursor);
	}
	
	public function addUserToGroup(){
		$groupName = $_POST['group'];
		$userid = $_POST['userid'];
		$query = array(
			'$push' => array('connections.$.users' => array('id' => $userid)));		
		$condition = array('_id' => "50f69176904e1d66affec20d",'connections.group' => $groupName);		
		$result = Users::update($query,$condition, array('atomic' => false));
		if($result)
			$this->redirect('Connections::getGroups');
		else
			return '0';		
	}
	
	public function getUserGroups(){
		$userid = $_POST['userid'];
		$myId = "50f69176904e1d66affec20d";
		$groupCursor = Users::find('all',array('conditions' => array('_id' => $myId, 'connections.users.id' => $userid),'fields' => array('connections' => array('$elemMatch' => array('users.id' => $userid)))));
		$groups = array();
		
		foreach($groupCursor as $connections){
			foreach($connections['connections'] as $connection){	
				if($connection['group'])						
					array_push($groups, $connection['group']);
			}
		}
		//var_dump($groupCursor);
		return json_encode($groups);
	
		
		/*$groupCursor = Users::connection()->connection->command(array(
			'aggregate' => 'users',
			'pipeline' => array(				
					array( '$match' => array('_id' => $myId)),
					array( '$unwind' => '$connections' ),
					array( '$match' => array('connections.users.id' => '50f651b8b58bba7fbec2f223')),
					array( '$group' => array('_id' => '$connections.group'))
					)
		));  
		*/
		/* $mongodb = Connections::get('default')->connection;
		
		$result = $mongodb->users->aggregate([
			[ '$match' => [ '_id' => $myId ] ],
			[ '$unwind' => '$connections' ],
			[ '$match' => [ '$or' => [ [ 'connections.users' => [ '$exists' => false ] ], [ 'connections.users.id' =>  '50f651b8b58bba7fbec2f223' ] ] ] ],
			[ '$group' => [ '_id' => '$connections.group' ] ]
		]); 
		
		echo var_dump($result);*/
	}
	
	
}

?>
