<?php
defined('_JEXEC') or die();

class TestMakerTableTest extends JTable{
	
	public function __construct($db){
		parent::__construct('#__testmaker_tests', 'idTest', $db);
	}

	//переопределение метода публикация/снятие с публикации
	public function publish($pks = null, $state = 1, $userId = 0) { // $pks массив первичных ключей 
	
	JArrayHelper::toInteger($pks);
	$state = (int)$state;
	
	if(empty($pks)) {
		throw new RuntimeException(JText::_('JLIB_DATABASE_ERROR_NO_ROWS_SELECTED'));
	}
	
	foreach($pks as $pk) {
		if(!$this->load($pk)) {
			throw new RuntimeException(JText::_('COM_TESTMAKER_TABLE_ERROR_TEST'));
		}
		$this->state = $state;
		
		// $this->store() записывает/обновляет данные в БД
		if(!$this->store()) {
			throw new RuntimeException(JText::_('COM_TESTMAKER_TABLE_ERROR_TEST_STORE'));
		}
	}
	
	return true;
	
	}
}

?>