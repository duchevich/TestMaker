<?php
// класс бокового меню админки


defined('_JEXEC') or die();

abstract class TestMakerHelper{

	public static function addSubMenu($viewName) {

		JHtmlSidebar::addEntry(
						JText::_('COM_TESTMAKER_SUBMENU_ANSWERS'),
						'index.php?option=com_testmaker&view=answersAll',
						$viewName == 'answersAll'
						);

		JHtmlSidebar::addEntry(
						JText::_('COM_TESTMAKER_SUBMENU_QUESTIONS'),
						'index.php?option=com_testmaker&view=questions',
						$viewName == 'questions'
						);
						
		JHtmlSidebar::addEntry(
						JText::_('COM_TESTMAKER_SUBMENU_CATEGORIES'),
						'index.php?option=com_testmaker&view=categories',
						$viewName == 'categories'
						);	
		JHtmlSidebar::addEntry(
						JText::_('COM_TESTMAKER_SUBMENU_TESTS'),
						'index.php?option=com_testmaker&view=tests',
						$viewName == 'tests'
						);	
		return 	JHtmlSidebar::render();
	}
	
	// создание кнопки 'Правильный ответ' 
	public static function rightAnswer($value, $i, $prefix='', $can=true, $img1 = 'rating_star.png', $img0 = 'rating_star_blank.png'){

		if(is_object($value)){
			$value = $value->valueAnsver;
		}

		$class = "class='btn btn-micro hasTooltip ";
		if(!$can){
			$class .= "disabled";
		}
		$class .= "'";

		$img = $value ? $img1 : $img0;

		$task = $value ? 'wrong' : 'valueAnsver';

		$alt = $value ? 'Правильный ответ' : 'Неправильный ответ';

		$action = $value ? 'Правильный ответ' : 'Неправильный ответ';

		$html = '<a '.$class;
		
		$html .= ' onclick="return listItemTask(\'cb'.$i.'\',\''.$prefix.$task.'\')" title="'.$action.'"';
		
		$html .= '>'.JHtml::image('media/com_testmaker/images/'.$img, $alt).'</a>';


		return $html;
	}
}

?>