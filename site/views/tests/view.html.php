<?php
	defined("_JEXEC") or die();

	class TestMakerViewTests extends JViewLegacy{
		
		protected $items;
		protected $pagination;
		protected $state;

		public function display($tpl = null){

			$items = $this->get('Items');
			$this->pagination = $this->get('Pagination');
			$this->state = $this->get('State');

			$this->items = $items;
			$this->setDocument();
			parent::display($tpl);
		}

		protected function setDocument(){
			JHtml::_('jquery.framework');
			$url = JUri::base() . 'templates/custom/js/sample.js';
			$document = JFactory::getDocument();
			$document->addStyleSheet(JUri::base().'/media/com_testmaker/css/bootstrap.min.css');
			$document->addStyleSheet(JUri::base().'/media/com_testmaker/css/bootstrap-theme.min.css');
			$document->addStyleSheet(JUri::base().'/media/com_testmaker/css/style.css');
			$document->addScript(JUri::base().'/media/com_testmaker/js/bootstrap.min.js');
			$document->addScript(JUri::base().'/media/com_testmaker/js/script.js');
		}
	}
?>