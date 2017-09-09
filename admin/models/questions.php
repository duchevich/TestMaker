<?php
defined('_JEXEC') or die();

class TestMakerModelQuestions extends JModelList{

	protected function getListQuery() {
		
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		$query->select('q.idQuestion, q.name, q.state');
		$query->from('#__testmaker_questions AS q');
		$query->select('t.name AS nameTest');
		$query->leftJoin('#__testmaker_tests AS t ON q.idTest = t.idTest');

		
		$query->select('COUNT(a.idAnswer) AS total');
		$query->leftJoin('#__testmaker_answers AS a ON a.idQuestion = q.idQuestion');
		
		$query->group('q.idQuestion');


		$search = $this->getState('filter.search');
 		

 			
		if (!empty($search))
		{
			 $like = $db->quote('%' . $search . '%');
			 $query->where('q.name LIKE ' . $like);
		}
		
		$test = $this->getState('filter.test');
		if(!empty($test)) {
			$query->where('q.idTest = '.(int)$test);
		}
		

		
		//Фильтруем по состоянию.
		$published = $this->getState('filter.state');
		if (is_numeric($published))
		{
			if($published == 0) {
				$query->where('q.state = "0"');
			}
			if($published == 1) {
				$query->where('q.state = "1"');
			}
		}


		return $query;
	}
}

?>