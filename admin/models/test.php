<?php
defined('_JEXEC') or die();

class TestMakerModelTest extends JModelAdmin{

	public function getForm($data = [], $loadData = true){
		$form = $this->loadForm($this->option . 'test', 'test', array('control'=>'jform', 'load_data'=>$loadData));
		if(empty($form)){
			return false;
		}
		return $form;
	}
	public function getTable($type = 'Test', $prefix = 'TestMakerTable', $config = []){
		return JTable::getInstance($type, $prefix, $config);
	}
	protected function loadFormData(){
		$data = JFactory::getApplication()->getUserState('com_testmaker.edit.test.data', []);

		if(empty($data)){
			$data = $this->getItem();
		}

		return $data;
	}

	public function save($data) {
		

		if(!trim($data['name'])) {
			$this->setError(JText::_('COM_DOSKA_WARNING_PROVIDE_VALID_NAME'));
			return FALSE;
		}
		
		if(trim($data['alias']) == '') {
			$data['alias'] = $data['name'];
			$data['alias'] = JApplicationHelper::stringURLSafe($data['alias']);
		}
		
		
		if(parent::save($data)) {
			return TRUE;
		}
		return FALSE;
	}
}

?>