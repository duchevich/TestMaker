<?php
defined('_JEXEC') or die();

class TestMakerViewCategory extends JViewLegacy{
  
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

    $isnew = (isset($this->item->idCategory) == 0);


    if($isnew){
      $title = JText::_("COM_TESTMAKER_MENEGER_CATEGORIES_ADD_CATEGORY");
    }
    else{
      $title = JText::_("COM_TESTMAKER_MENEGER_CATEGORIES_EDIT_CATEGORY");
    }
    
    JToolBarHelper::title($title);
    JToolBarHelper::apply('category.apply');
    JToolbarHelper::save2new('category.save2new');
    JToolBarHelper::save('category.save');
    JToolBarHelper::cancel('category.cancel');
  }
  
  protected function setDocument(){
    
    $document = JFactory::getDocument();
    
    //добавление тега <title>
    $document->setTitle(JText::_("COM_TESTMAKER_MENEGER_CATEGORIES_NEW_CATEGORY_TITLE"));
    
     // добавление файла style.css
    $document->addStyleSheet(JUri::root(true) . '/media/com_testmaker/css/style.css');
  }
}

?>