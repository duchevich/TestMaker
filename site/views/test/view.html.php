<?php
	defined("_JEXEC") or die();

	class TestMakerViewTest extends JViewLegacy{
		
		protected $items;

		protected $state;

		public function display($tpl = null){

			$items = $this->get('Items');

			$this->state = $this->get('State');

			$this->items = $items;

			$session = JFactory::getSession();
			$app = JFactory::getApplication();
			$keyIds = 'com_testmaker.test.mytest.ids';
			$keyIdAnswers = 'com_testmaker.test.mytest.IdAnswers';
			$keyFinishTest = 'com_testmaker.test.mytest.finishTest';
			$val = $this->items;
			$IdAnswers = [];
			$finishTest = false;
			$app->setUserState($keyIds, $val);
			$app->setUserState($keyIdAnswers, $IdAnswers);
			$app->setUserState($keyFinishTest, $finishTest);
			

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