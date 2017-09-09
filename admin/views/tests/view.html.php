<?php
defined('_JEXEC') or die();

class TestMakerViewTests extends JViewLegacy{

	protected $items;
	protected $pagination;
	public $filterForm;

	public function display($tpl = null){ // переопределение стандартного шаблона default
		
	$this->items = $this->get('Items');///getItems()

	$this->sidebar = TestMakerHelper::addSubMenu('tests');

	$this->pagination = $this->get('Pagination');

	$this->filterForm = $this->get('FilterForm');

	$this->activeFilters = $this->get('ActiveFilters');

	$this->addToolBar();
	
	parent::display($tpl);
	}

	protected function addToolBar(){
		JToolBarHelper::title(JText::_('COM_TESTMAKER_MENEGER_TESTS'));
		JToolBarHelper::addNew('test.add');
		JToolBarHelper::editList('test.edit');
		JToolBarHelper::publish('tests.publish', 'JTOOLBAR_PUBLISH', true);
		JToolBarHelper::unpublish('tests.unpublish', 'JTOOLBAR_UNPUBLISH', true);
		JToolBarHelper::deleteList('', 'tests.delete');
		JToolBarHelper::preferences('com_testmaker');
	}
}

?>
