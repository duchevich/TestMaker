<?php
defined('_JEXEC') or die();

class TestMakerModelQuestion extends JModelAdmin{
	
	public function getForm($data = [], $loadData = true){
		$form = $this->loadForm($this->option . 'question', 'question', array('control'=>'jform', 'load_data'=>$loadData));
		if(empty($form)){
			return false;
		}
		return $form;
	}

	public function getTable($type = 'Question', $prefix = 'TestMakerTable', $config = []){
		return JTable::getInstance($type, $prefix, $config);
	}

	protected function loadFormData(){
		$data = JFactory::getApplication()->getUserState('com_testmaker.edit.question.data', []);

		if(empty($data)){
			$data = $this->getItem();
		}

		return $data;
	}
}

?>