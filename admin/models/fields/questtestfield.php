<?php
defined('_JEXEC') or die();

//доступ в классу из форм
JFormHelper::loadFieldClass('List');

class JFormFieldQuesttestfield extends JFormFieldList{

	protected $type = 'questtestfield';

	protected function getOptions(){
		$options = [];
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select($db->quoteName(['idCategory', 'name'], ['value', 'text']));
		$query->from($db->quoteName('#__testmaker_categories'));
		$query->where($db->quoteName('state'). ' = ' . $db->quote(1));
		$db->setQuery($query);

		try {
			$row = $db->loadObjectList();
		}
		catch(RuntimeException $e){

			JError::raiseWarning(500, $e->getMessage());
		}



		$parent = new stdClass;
		$parent->text = JText::_('COM_TESTMAKER_TEST_FIELD_NOCATEGORY');
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