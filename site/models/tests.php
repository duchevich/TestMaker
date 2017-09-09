<?php
	defined("_JEXEC") or die();

	class TestMakerModelTests extends JModelList{
		protected function getListQuery(){
			$query = parent::getListQuery();

			$query->select('name, state, idTest');
			$query->from('#__testmaker_tests');
			$query->where('state = "1"');

			return $query;
		}
	}

?>