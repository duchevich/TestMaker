<?php
defined('_JEXEC') or die();

class TestMakerControllerCategories extends JControllerAdmin{
  public function getModel($name = 'Category', $prefix = 'TestMakerModel', $config = []){
  	return parent::getModel($name, $prefix, $config);
  }

}

?>