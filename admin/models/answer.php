<?php
defined('_JEXEC') or die();

class TestMakerModelAnswer extends JModelAdmin{
	
	public function getForm($data = [], $loadData = true){
		$form = $this->loadForm($this->option . 'answer', 'answer', array('control'=>'jform', 'load_data'=>$loadData));
		if(empty($form)){
			return false;
		}
		return $form;
	}

	public function getTable($type = 'Answer', $prefix = 'TestMakerTable', $config = []){

		return JTable::getInstance($type, $prefix, $config);
	}

	protected function loadFormData(){
		$data = JFactory::getApplication()->getUserState('com_testmaker.edit.answer.data', []);

		if(empty($data)){
			$data = $this->getItem();
		}

		return $data;
	}
	
	public function valueAnsver($cid, $value){
		$table = $this->getTable();
		if($table->load($cid)) {
			
			if(!$table-> valueAnsver($cid,$value)) {
				
				$this->setError($table->getError());
				return FALSE;
			}
		}
		else {
			$this->setError($table->getError());
			return FALSE;
		}
		
		$this->cleanCache();
		
		return TRUE;

	}
}

?>