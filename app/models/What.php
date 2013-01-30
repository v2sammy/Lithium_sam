<?php 
namespace app\models;
use \lithium\data\connections;

class What extends \lithium\data\Model {

	protected function _init() {
        	$this->_render['negotiate'] = true;
        	parent::_init();
   }	
	
	/* for retrieval from users collection */
	public function getWhats($type){					
		$whats = What::find($type);
		return $whats;
	}
	
	/* for updating user collection */
	public function updateWhat($query, $condition){
		$result = What::update($query,$condition, array('atomic' => false));		
		return $result;	
	}

}
 
 
?>
