<?php
  defined('_JEXEC') or die();

  class TestMakerControllerAnswer extends JControllerForm{

  	public function save($key = null, $urlVar = null){
  	$app = JFactory::getApplication();
	$keyIdQuestion = 'com_testmaker.test.mytest.idQuestion';

	
	$id = intval($app->getUserState($keyIdQuestion));

	 echo $id;
	if($_POST['jform']['idQuestion'] == 0){
		$_POST['jform']['idQuestion'] = $id;
	}

  		parent::save();
  	}
  	
}


?>