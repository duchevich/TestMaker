<?php
	defined("_JEXEC") or die();

	class TestMakerModelQuest extends JModelList{

		protected function getListQuery(){
			$query = parent::getListQuery();
			$session = JFactory::getSession();
			$app = JFactory::getApplication();

			$keyIds = 'com_testmaker.test.mytest.ids';
			$keyIdAnswers = 'com_testmaker.test.mytest.IdAnswers';
			$keyFinishTest = 'com_testmaker.test.mytest.finishTest';
			
			if(isset($_POST['answerId'])){

				$idsAnswers = $app->getUserState($keyIdAnswers);

				$idsAnswers[] = $_POST['answerId'];
				$app->setUserState($keyIdAnswers, $idsAnswers);
			}

			if($app->getUserState($keyIds)){

				// выборка ответов
				$val = $app->getUserState($keyIds);

				// id вопроса для запроса в бд
				$arr = array_shift($val);
				$id = (int)$arr->idQuestion;

				$app->setUserState($keyIds, $val);

				$query->select('a.idAnswer, a.textAnswer, a.valueAnsver');
				$query->from('#__testmaker_answers AS a');
				$query->where('a.state = "1" AND a.idQuestion ='.$id);

				$query->select('q.name');
				$query->join('LEFT', '#__testmaker_questions AS q ON q.idQuestion ='.$id);
				
				return $query;
			}
			else{
				$finishTest = $app->getUserState($keyFinishTest);
				$finishTest = true;
				$app->setUserState($keyFinishTest, $finishTest);


				// запрос результата тестирования
				if($app->getUserState($keyIdAnswers)){
					$res = $app->getUserState($keyIdAnswers);

					$query->select('valueAnsver')->from('#__testmaker_answers')
					->where('idAnswer IN (' . implode(',', array_map('intval', $res)) . ')');

				}
				
				return $query;

			}

			
		}
	}
?>