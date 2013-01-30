<?php 
namespace app\models;
use \lithium\data\connections;

class Which extends \lithium\data\Model {

	protected function _init() {
        	$this->_render['negotiate'] = true;
        	parent::_init();
   }	
	
	/* for retrieval from users collection */
	public function getWhichs($type){					
		$whichs = Which::find($type);
		return $whichs;
	}
	
	/* for updating user collection */
	public function updateWhich($query, $condition){
		$result = Which::update($query,$condition, array('atomic' => false));		
		return $result;	
	}

}
 
 
?>
