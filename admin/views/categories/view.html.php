<?php
defined('_JEXEC') or die();

class TestMakerViewCategories extends JViewLegacy{

	protected $items;
	protected $pagination;
	public $filterForm;

	public function display($tpl = null){

		$this->sidebar = TestMakerHelper::addSubMenu('categories');

		$categories = $this->get('Items');

		$this->items = [];

		if(is_array($categories)) {
			foreach($categories as $row) {
			$this->items[$row->idCategory]['name'] = $row->name;
			$this->items[$row->idCategory]['state'] = $row->state;
			}
		}

		$this->pagination = $this->get('Pagination');

		$this->filterForm = $this->get('FilterForm');//getFilterForm();

		$this->activeFilters = $this->get('ActiveFilters');//getActiveFilters();

		$this->addToolBar();

		parent::display($tpl);
	}

	protected function addToolBar(){
		JToolBarHelper::title(JText::_('COM_TESTMAKER_MENEGER_CATEGORIES'));
		JToolBarHelper::addNew('category.add');
		JToolBarHelper::editList('category.edit');
		JToolBarHelper::publish('categories.publish', 'JTOOLBAR_PUBLISH', true);
		JToolBarHelper::unpublish('categories.unpublish', 'JTOOLBAR_UNPUBLISH', true);
		JToolBarHelper::deleteList('', 'categories.delete');
		JToolBarHelper::preferences('com_testmaker');
	}
}

?>
