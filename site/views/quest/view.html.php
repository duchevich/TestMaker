<?php
	defined("_JEXEC") or die();

	class TestMakerViewQuest extends JViewLegacy{

		public function display($tpl = null){

			$items = $this->get('Items');

			$this->items = $items;
			$this->setDocument();
			
			$session = JFactory::getSession();
			$app = JFactory::getApplication();

			$keyIds = 'com_testmaker.test.mytest.ids';


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
		