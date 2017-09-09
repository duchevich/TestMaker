<?php

defined('_JEXEC') or die();
JFormHelper::loadFieldClass('list');

class JFormFieldListquest extends JFormFieldList {
	
	protected $type = 'Listquest';
 
	protected function getOptions() {
		
		$parent = parent::getOptions();
		
		$opt = $this->getAttribute('option');
		
		$options = array();
		if(!empty($parent)) {
			foreach($parent as $option) {
				array_push($options, $option);
			}
		}
		
		
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		if($opt == "question") {
			$query->select('idQuestion AS value, name AS text')
			->from('#__testmaker_questions')
			->where('state = "1"');
		}
		
		$db->setQuery($query);
		
		try
		{
			$row = $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			JFactory::getApplication()->unqueueMessage($e->getMessage,'error');
		}
		$row = $db->loadObjectList();

		if ($row)
		{
			for($i = 0;$i<count($row);$i++)
			{
				array_push($options,$row[$i]);
			}
		}
		
		return $options;
	}
}