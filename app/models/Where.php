<?php 
namespace app\models;
use \lithium\data\connections;

class Where extends \lithium\data\Model {

	protected function _init() {
        	$this->_render['negotiate'] = true;
        	parent::_init();
   }	
	
	/* for retrieval from users collection */
	public function getWheres($type){					
		$where = Where::find($type);
		return $wheres;
	}
	
	/* for updating user collection */
	public function updateWhere($query, $condition){
		$result = Where::update($query,$condition, array('atomic' => false));		
		return $result;	
	}

}
 
 
?>
