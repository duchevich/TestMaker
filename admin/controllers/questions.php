<?php
defined('_JEXEC') or die();

class TestMakerControllerQuestions extends JControllerAdmin{
  public function getModel($name = 'Question', $prefix = 'TestMakerModel', $config = []){
  	return parent::getModel($name, $prefix, $config);
  }

}

?>