<?php
defined('_JEXEC') or die();

// получение массива записей из БД
class TestMakerModelAnswers extends JModelList{
	protected function getListQuery() {
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$app = JFactory::getApplication();
		$keyIdQuestion = 'com_testmaker.test.mytest.idQuestion';

		if($app->input->getInt('idQuestion')){
			$id = $app->input->getInt('idQuestion');
		}
		else{
			$id = intval($app->getUserState($keyIdQuestion));
		}

		if($id){
			$query->select('a.idAnswer, a.textAnswer, a.valueAnsver, a.state');
			$query->from('#__testmaker_answers AS a');
			$query->where('a.idQuestion = '.$id);
			$query->select('q.name AS nameQuestion, q.idQuestion');
			$query->join('LEFT', '#__testmaker_questions AS q ON a.idQuestion = q.idQuestion');
			$query->select('t.name AS nameTest, t.idTest');
			$query->join('LEFT', '#__testmaker_tests AS t ON q.idTest = t.idTest');
		}
		else{
			$query->select('a.idAnswer, a.textAnswer, a.valueAnsver, a.state');
			$query->from('#__testmaker_answers AS a');
			$query->select('q.name AS nameQuestion, q.idQuestion');
			$query->join('LEFT', '#__testmaker_questions AS q ON a.idQuestion = q.idQuestion');
			$query->select('t.name AS nameTest, t.idTest');
			$query->join('LEFT', '#__testmaker_tests AS t ON q.idTest = t.idTest');
		}
		
		$search = $this->getState('filter.search');
 		
		if (!empty($search))
		{
			$like = $db->quote('%' . $search . '%');
			$query->where('a.textAnswer LIKE ' . $like);
		}
		
		$question = $this->getState('filter.question');
		if(!empty($question)) {
			$query->where('a.idQuestion = '.(int)$question);
		}
		
		$test = $this->getState('filter.test');
		if(!empty($test)) {
			$query->where('t.idTest = '.(int)$test);
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