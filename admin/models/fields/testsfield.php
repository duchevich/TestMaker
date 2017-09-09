<?php
defined('_JEXEC') or die();

//доступ в классу из форм
JFormHelper::loadFieldClass('List');

class JFormFieldtestsfield extends JFormFieldList{

	protected $type = 'testsfield';

	protected function getOptions(){
		$options = [];
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select($db->quoteName(['idTest', 'name'], ['value', 'text']));
		$query->from($db->quoteName('#__testmaker_tests'));
		$query->where($db->quoteName('state'). ' = ' . $db->quote(1));
		$db->setQuery($query);

		try {
			$row = $db->loadObjectList();
		}
		catch(RuntimeException $e){

			JError::raiseWarning(500, $e->getMessage());
		}



		$parent = new stdClass;
		$parent->text = JText::_('COM_TESTMAKER_QUESTION_SELECT_TEST');
		$parent->value = 0;

		array_push($options, $parent);
		if($row){
			for($i = 0; $i < count($row); $i++){
				
					array_push($options, $row[$i]);
				
			}
		}


		return $options;
	}
}
?>