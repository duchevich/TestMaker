<?php
defined('_JEXEC') or die();

class TestMakerControllerTests extends JControllerAdmin{
  public function getModel($name = 'Test', $prefix = 'TestMakerModel', $config = []){
  	return parent::getModel($name, $prefix, $config);
  }

}

?>