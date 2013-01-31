<?php
namespace app\models;

class Hows extends \lithium\data\Model {
	protected function _init() {
		$this->_render['negotiate'] = true;
		parent::_init();
	}
}

?>

