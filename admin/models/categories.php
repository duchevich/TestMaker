<?php
defined('_JEXEC') or die();

// получение массива записей из БД
class TestMakerModelCategories extends JModelList{
	protected function getListQuery() {
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('idCategory, name, state, alias');
		$query->from('#__testmaker_categories');


		$search = $this->getState('filter.search');
		if (!empty($search))
		{
			 $like = $db->quote('%' . $search . '%');
			 $query->where('name LIKE ' . $like);
		}


		$published = $this->getState('filter.state');
		if (is_numeric($published))
		{
			if($published == 0) {
				$query->where('state = "0"');
			}
			if($published == 1) {
				$query->where('state = "1"');
			}
		}
			
		return $query;
	}
}

?>