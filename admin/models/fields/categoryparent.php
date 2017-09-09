<?php
defined('_JEXEC') or die();

//доступ в классу из форм
JFormHelper::loadFieldClass('List');

class JFormFieldCategoryparent extends JFormFieldList{

	protected $type = 'Categoryparent';

	protected function getOptions(){
		$options = [];
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select($db->quoteName(['idCategory', 'name', 'idCategoryParent'], ['value', 'text', 'idCategoryParent']));
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
		$parent->text = JText::_('JGLOBAL_ROOT_PARENT');
		$parent->value = 0;

		array_push($options, $parent);
		if($row){
			for($i = 0; $i < count($row); $i++){
				if($row[$i]->idCategoryParent == 0){
					array_push($options, $row[$i]);
				}
			}
		}


		return $options;
	}
}
?>