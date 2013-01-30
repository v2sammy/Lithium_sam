<?php 
namespace app\models;
use \lithium\data\connections;

class Groups extends \lithium\data\Model {

	public function addGroup($data){
		$result = Groups::create($data);
		return $result->save();
	}
	
	public function getGroups($type,$options){
		$groups = Groups::find($type,$options);
		return $groups;
	}
	
	public function updateGroup($data,$options){
		$result = Groups::update($data,$options, array('atomic' => false));
		return $result;
	}
	
	public function deleteGroup($condition){
		$result = Groups::remove($condition);
		return $result;
	}
	
}
?>
