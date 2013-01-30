<?php 
namespace app\models;
use \lithium\data\connections;

class How extends \lithium\data\Model {

	protected function _init() {
        	$this->_render['negotiate'] = true;
        	parent::_init();
   }	
	
	/* for retrieval from users collection */
	public function getHows($type){					
		$hows = How::find($type);
		return $hows;
	}
	
	
	/* for updating user collection */
	public function updateHow($query, $condition){
		$result = How::update($query,$condition, array('atomic' => false));		
		return $result;	
	}

}
 
 
?>
