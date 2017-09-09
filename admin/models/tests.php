<?php
defined('_JEXEC') or die();

// получение массива записей из БД
class TestMakerModelTests extends JModelList{
	protected function getListQuery() {
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		
		$query->select('a.idTest, a.name, a.state, a.alias');
		$query->from('#__testmaker_tests AS a');
		$query->select('b.name AS nameCategory');
		$query->join('LEFT', '#__testmaker_categories AS b ON a.idCategory = b.idCategory');

		if (!empty($search))
		{
			$like = $db->quote('%' . $search . '%');
			$query->where('a.name LIKE ' . $like);
		}
		
		$category = $this->getState('filter.category');
		if(!empty($category)) {
			$query->where('a.idCategory = '.(int)$category);
		}
		
		//Фильтруем по состоянию.
		$published = $this->getState('filter.state');
		if (is_numeric($published))
		{
			if($published == 0) {
				$query->where('a.state = "0"');
			}
			if($published == 1) {
				$query->where('a.state = "1"');
			}
		}

		return $query;
	}
}

?>
