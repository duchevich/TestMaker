<?php
/*
Точка входа компонента
Тут определяется объект главного контроллера компонента ($controller)
*/
  defined('_JEXEC') or die();
  
  //Получаем экземпляр контроллера
$controller = JControllerLegacy::getInstance('TestMaker');
$controller->registerTask('wrong', 'valueAnsver');

// регистрируем боковой сайдбар
JLoader::register('TestMakerHelper',__DIR__.'/helpers/testmaker.php');

//запрос задачи 
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task', 'display'));

//Перенаправление
$controller->redirect();

?>