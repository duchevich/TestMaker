<?php
defined('_JEXEC') or die();

class TestMakerViewAnswersAll extends JViewLegacy{

	protected $items;
	protected $pagination;
	public $filterForm;


	public function display($tpl = null){ // переопределение стандартного шаблона default
		// добавляем боковое меню
		$this->sidebar = TestMakerHelper::addSubMenu('answersAll');

		$this->items = $this->get('Items');//getItems();


		$this->pagination = $this->get('Pagination');//getPagination

		$this->filterForm = $this->get('FilterForm');//getFilterForm();

		$this->activeFilters = $this->get('ActiveFilters');//getActiveFilters();

		$this->addToolBar();

		parent::display($tpl);
	}

	protected function addToolBar(){

		JToolBarHelper::title(JText::_('COM_TESTMAKER_MENEGER_ANSWERS'));
		//JToolBarHelper::addNew('answer.add');
		JToolBarHelper::editList('answer.edit');
		JToolBarHelper::publish('answers.publish', 'JTOOLBAR_PUBLISH', true);
		JToolBarHelper::unpublish('answers.unpublish', 'JTOOLBAR_UNPUBLISH', true);
		JToolBarHelper::deleteList('', 'answers.delete');
		JToolBarHelper::preferences('com_testmaker');
	}
}

?>
