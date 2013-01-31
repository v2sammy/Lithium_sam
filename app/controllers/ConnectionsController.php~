<?php

namespace app\controllers;
use app\models\Users;
use app\models\Groups;
session_start();

class ConnectionsController extends \lithium\action\Controller {
		
	
		
		/* for searching the user */
		public function search(){
			$searchName = $_POST['searchName'];
			$usersList = array();
			$regexObj = new \MongoRegex("/^$searchName/i");				
			$users = Users::getUsers('all',array('conditions' => array('first_name' => $regexObj), 'fields' => array('first_name','_id','email')));
			$friendUsers = Users::getUsers('all',array('conditions' => array('_id' => new \MongoId($_SESSION['loggedInUser'])),'fields' => array('connections')));
			foreach($users as $user){
				$isFriend = '0';
					foreach($friendUsers[0]['connections'] as $friend){
						if($friend['id'] == $user['_id'])
						{
							$isFriend = '1';
							break;
						}
					}				
				array_push($usersList,array('name' => $user['first_name'], 'id' => $user['_id'], 'email' => $user['email'], 'isFriend' => $isFriend));	
			}
			return json_encode($usersList);
		}
		
		/* for connecting to a user */
		public function connect(){
			
			$id = $_POST['id'];
			$query = array(				
				'$push' => array('connections' => array('id' => $id))
			);			
			$mongoId = new \MongoId($_SESSION['loggedInUserId']);
			$condition = array('_id' => $mongoId);				
			$result = Users::connect($query,$condition);
			if($result)
				return '1';
			else
				return '0';
		}
		
		/* for retrieving all the connections of the logged in user */
		public function getConnections(){
					
			$userCursor = array();
			$condition = array('conditions' => array('_id' => new \MongoId($_SESSION['loggedInUserId'])),'fields' => array('connections.id'));
			$users = Users::getUsers('all',$condition);
			foreach($users as $user)
			{
				foreach($user['connections'] as $connection)
				{
					if($connection['id']){
						$subCondition = array('conditions' => array('_id' => new \MongoId($connection['id'])));
						array_push($userCursor,Users::getUsers('all', $subCondition));
					}
				}
			}
			return compact('userCursor');
			var_dump($userCursor);
		}
		
		/* for creating a new group */
		public function addGroup(){
			
			$data = array();
			$groupName = $_POST['group'];				
			$data['group_name'] = $groupName;
			$data['owner'] = $_SESSION['loggedInUserId'];
			$data['visibility'] = "private";
			$result = Groups::addGroup($data);
			if($result)
				$this->redirect('Connections::getPrivateGroups');
			else
				return '0';	
		}
		
		/* for retrieving groups of logged in user */
		public function getPrivateGroups(){
			
			$groupList = array();
			$options = array('conditions' => array('owner' => $_SESSION['loggedInUserId'],'visibility' => 'private'),'fields' => array('group_name'));
			$groups = Groups::getGroups('all',$options);
			foreach($groups as $group)
			{
				array_push($groupList,$group['group_name']);
			}
			
			return json_encode($groupList);
		}
		
		/* for retrieving the public groups, limited to 15 */
		public function getPublicGroups(){
			$groupList = array();
			$options = array('conditions' => array('visibility' => 'public'),'fields' => array('_id','group_name','users'), 'limit' => 15);
			$groups = Groups::getGroups('all',$options);
			return compact('groups');
		}
		
		/* for adding user to a public group */
		public function addUserToPublicGroup(){
		$groupId = $_POST['groupId'];
		
		$query = array(
			'$push' => array('users' => array('id' => $_SESSION['loggedInUserId'])));		
		$condition = array('_id' => $groupId);		
		$result = Groups::updateGroup($query,$condition);
		if($result)
		{
			$queryUser = array(
				'$push' => array('connections' => array('group_id' => $groupId)));		
			$conditionUser = array('_id' => $_SESSION['loggedInUserId']);		
			$resultUser = Users::updateUser($queryUser,$conditionUser);
			if($resultUser)
				return '1';
			else
				return '0';			
		}
		else
			return '0';		
		}
		
		/* for removing user from a public group */
		public function removeUserFromPublicGroup(){
			$groupId = $_POST['groupId'];
			
			$query = array(
				'$pull' => array('users' => array('id' => $_SESSION['loggedInUserId'])));		
			$condition = array('_id' => $groupId);		
			$result = Groups::updateGroup($query,$condition);
			if($result)
			{
				$queryUser = array(
					'$pull' => array('connections' => array('group_id' => $groupId)));		
				$conditionUser = array('_id' => $_SESSION['loggedInUserId']);		
				$resultUser = Users::updateUser($queryUser,$conditionUser);
				if($resultUser)
					return '1';
				else
					return '0';			
			}
			else
				return '0';		
		}
		
		/* for retrieving members of a group */
		public function getMembers(){
			$memberList = array();
			$groupId = $_POST['groupId'];
			$options = array('conditions' => array('_id' => $groupId));
			$memberIds = Groups::getGroups('all',$options);			
			foreach($memberIds as $memberId)
			{
				foreach($memberId['users'] as $members){
					$users = Users::getUsers('all', array('conditions' => array('_id' => $members['id']), 'fields' => array('name')));
					foreach ($users as $user)					
						array_push($memberList, $user['name']);
				}
			}
			return json_encode($memberList);		
		}
		
		/* for searching a group */			
		public function searchGroup(){
		
			$searchName = $_POST['group_name'];	
			$groupList = array();
			$isMember = '0';
			$regexObj = new \MongoRegex("/^$searchName/i");				
			$groups = Groups::getGroups('all',array('conditions' => array('group_name' => $regexObj,'visibility' => 'public')));
			foreach($groups as $group)
			{			foreach($group['users'] as $user){
							if($user['id'] == $_SESSION['loggedInUserId']){
								$isMember = '1';
								break;
							}
						}	
						array_push($groupList, array('group_name' => $group['group_name'], 'id' => $group['_id'],'users' => $group['users'],'isMember' => $isMember));
						$isMember = '0';
			}
			return json_encode($groupList);		
		}
		
		/* for retrieving all the groups pertaining to logged in user */
		public function userGroups(){
			
			$groupList = array();
			$isOwner = '0';
			$groups = Groups::getGroups('all',array('conditions' => array('$or' =>array(array('owner' => $_SESSION['loggedInUserId']),array('users.id' => $_SESSION['loggedInUserId']))),'fields' => array('group_name','_id','owner','users.id','visibility')));
			return compact('groups');
		}
		
		/* for deleting a group */
		public function deleteGroup(){
			
			$groupId = $_POST['groupId'];
			$mongoId = new \MongoId($groupId);
			$result = Groups::deleteGroup(array('_id' => $mongoId));
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
