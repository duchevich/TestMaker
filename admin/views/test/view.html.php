<?php
defined('_JEXEC') or die();

class TestMakerViewTest extends JViewLegacy{
  
  protected $item;
  protected $form;

  public function display($tpl = null){ // переопределение стандартного шаблона default

     //обращение к модели
    $this->form = $this->get('Form'); // метод модели getForm

    $this->item = $this->get('Item');

    $this->addToolBar();
    
    $this->setDocument();
      
    parent::display($tpl);
  }
  
  //метод панели инструментов
  protected function addToolBar(){
    // инактивирует главное меню
    JFactory::getApplication()->input->set('hidemainmenu', true);
    
    $isnew = (isset($this->item->idTest) == 0);


    if($isnew){
      $title = JText::_("COM_TESTMAKER_MENEGER_TEST_ADD_TEST");
    }
    else{
      $title = JText::_("COM_TESTMAKER_MENEGER_TEST_EDIT_TEST");
    }
    
    JToolBarHelper::title($title);
    JToolBarHelper::apply('test.apply');
    JToolbarHelper::save2new('test.save2new');
    JToolBarHelper::save('test.save');
    JToolBarHelper::cancel('test.cancel');
  }
  
  protected function setDocument(){
    
    $document = JFactory::getDocument();
    
    //добавление тега <title>
    $document->setTitle(JText::_("COM_TESTMAKER_MENEGER_TEST_NEW_TEST_TITLE"));
    
     // добавление файла style.css
    $document->addStyleSheet(JUri::root(true) . '/media/com_testmaker/css/style.css');
  }
}

?>