<?php
defined('_JEXEC') or die();

class TestMakerTableAnswer extends JTable{
	
	public function __construct($db){
		parent::__construct('#__testmaker_answers', 'idAnswer', $db);
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

	public function valueAnsver($cid, $value = 0) {
		
		
		if(empty($cid)) {
			throw new RuntimeException(JText::_("COM_DOSKA_MESSAGE_CONFIRM_NO_ID"));
		}
		
		if(!isset($this->valueAnsver)) {
			throw new RuntimeException(JText::_("COM_DOSKA_MESSAGE_CONFIRM_NO_DATA"));
		}
		
		$this->valueAnsver = $value;

		if(!$this->store()) {
			throw new RuntimeException(JText::_("COM_DOSKA_MESSAGE_CONFIRM_ERROR_BD"));
		}


		$db = JFactory::getDbo(); 
		$query = $db->getQuery(true);
		$query->update('#__testmaker_answers' );
		if($this->valueAnsver == 1){
			$query->set( 'valueAnsver = "0"' );
		}
		
		$query->where( 'idQuestion = '. $this->idQuestion);
		$query->where( 'idAnswer != '. $this->idAnswer);
		$db->setQuery( $query )->execute(); 
		
		
		return TRUE;
		
	}
	
}

?>