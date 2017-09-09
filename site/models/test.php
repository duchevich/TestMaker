<?php
	defined("_JEXEC") or die();

	class TestMakerModelTest extends JModelList{
		protected function getListQuery(){
			$query = parent::getListQuery();
			$app = JFactory::getApplication();
			$id = $app->input->getInt('idTest');
			

			$query->select('q.idQuestion');
			$query->from('#__testmaker_questions AS q');
			$query->where('q.state = "1" AND q.idTest ='.$id);
			$query->select('t.name');
			$query->join('left', '#__testmaker_tests AS t ON t.idTest ='.$id);
			

			
			return $query;
		}
	}

?>