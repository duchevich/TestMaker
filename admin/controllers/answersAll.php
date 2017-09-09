<?php
defined('_JEXEC') or die();

class TestMakerControllerAnswersAll extends JControllerAdmin{

	public function getModel($name = 'Answer', $prefix = 'TestMakerModel', $config = []){

		return parent::getModel($name, $prefix, $config);
	}

  	public function valueAnsver() {

		JSession::checkToken() or die(JText::_('JINVALID_TOKEN'));
		
		$cid = JFactory::getApplication()->input->get('cid',array(),'array');
		
		$data = array('valueAnsver'=> 1,'wrong'=> 0);
		
		$task = $this->getTask();
		
		$value = JArrayHelper::getValue($data, $task, 0,'int');
	
		if($cid){
			$model = $this->getModel();
			JArrayHelper::toInteger($cid);

			try{
				$model->valueAnsver($cid[0], $value);
				if($value == 1){
					$text = "COM_TESTMAKER_MENEGER_ANSWERS_RIGHT_ANSWER";

				}
				elseif($value == 0){
					$text = "COM_TESTMAKER_MENEGER_ANSWERS_WRONG_ANSWER";
				}
				$this->setMessage(JText::_($text));
			}
			catch(RuntimeException $e){
				$this->setMessage($e->getMessage(),'error');
			}
		}

		$this->setRedirect(JRoute::_('index.php?option='.$this->option.'&view='.$this->view_list, false));

	}

}

?>