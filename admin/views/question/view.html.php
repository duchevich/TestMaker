<?php
defined('_JEXEC') or die();

class TestMakerViewQuestion extends JViewLegacy{

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

    $isnew = (isset($this->item->idQuestion) == 0);


    if($isnew){
      $title = JText::_("COM_TESTMAKER_MENEGER_QUESTIONS_ADD_QUESTION");
    }
    else{
      $title = JText::_("COM_TESTMAKER_MENEGER_QUESTIONS_EDIT_QUESTION");
    }
    
    JToolBarHelper::title($title);
    JToolBarHelper::apply('question.apply');
    JToolbarHelper::save2new('question.save2new');
    JToolBarHelper::save('question.save');
    JToolBarHelper::back();
    JToolBarHelper::cancel('question.cancel');
  }
}

?>