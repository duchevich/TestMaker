<?php
defined('_JEXEC') or die();

class TestMakerViewQuestions extends JViewLegacy{

  protected $items;
  protected $pagination;
  protected $state;
  protected $params;
  public $filterForm;
  
  public function display($tpl=null){

		$this->state = $this->get('State');

		$this->items = $this->get('Items');

		$this->pagination = $this->get('Pagination');
    
		$this->sidebar = TestMakerHelper::addSubMenu('questions');

		$this->filterForm = $this->get('FilterForm');//getFilterForm();

		$this->activeFilters = $this->get('ActiveFilters');//getActiveFilters();

		$this->addToolBar();
		
		parent::display($tpl);
	}

	protected function addToolBar(){
		JToolBarHelper::title(JText::_('COM_TESTMAKER_MENEGER_QUESTIONS'));
		JToolBarHelper::addNew('question.add');
		//JToolBarHelper::addNew('answer.add', JText::_('COM_TESTMAKER_ANSWERS_ADD'));
		JToolBarHelper::editList('question.edit');
		JToolBarHelper::publish('questions.publish', 'JTOOLBAR_PUBLISH', true);
		JToolBarHelper::unpublish('questions.unpublish', 'JTOOLBAR_UNPUBLISH', true);
		JToolBarHelper::deleteList('', 'questions.delete');
	}

}

?>