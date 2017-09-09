<?php
defined('_JEXEC') or die();

class TestMakerViewAnswer extends JViewLegacy{

	protected $item;
	protected $form;

	public function display($tpl = null){ // переопределение стандартного шаблона default

		//обращение к модели
		$this->form = $this->get('Form'); // метод модели getForm

		$this->item = $this->get('Item');

		$this->addToolBar();

		parent::display($tpl);
	}

	protected function addToolBar(){
		// инактивирует главное меню
		JFactory::getApplication()->input->set('hidemainmenu', true);

		$isnew = (isset($this->item->idAnswer) == 0);


		if($isnew){
		$title = JText::_("COM_TESTMAKER_MENEGER_ANSWERS_ADD_ANSWER");
		}
		else{
		$title = JText::_("COM_TESTMAKER_MENEGER_ANSWERS_EDIT_ANSWER");
		}

		JToolBarHelper::title($title);
		JToolBarHelper::apply('answer.apply');
		JToolbarHelper::save2new('answer.save2new');
		JToolBarHelper::save('answer.save');
		JToolBarHelper::back();
		JToolBarHelper::cancel('question.cancel');
	}
}

?>