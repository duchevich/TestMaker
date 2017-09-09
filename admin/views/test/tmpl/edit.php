<?php 
  defined('_JEXEC') or die();

  // декорация селекта опубликовано/неопубликовано
  JHtml::_('formbehavior.chosen', 'select');
  
  // продление сессии
  JHtml::_('behavior.keepalive');

 ?>

 <form action="<?php echo JRoute::_('index.php?option=com_testmaker&layout=edit&idTest='.(int)$this->item->idTest) ?>" method="POST" id="adminForm" name="adminForm" class="form-validate">
	
	<div class="row-fluid">
		<div class="span9">

			<?php 
			// стандартные шаблоны
			echo JLayoutHelper::render('joomla.edit.title_alias', $this); 
			?>
		</div>
		<div class="span3">
			<?php echo JLayoutHelper::render('edit.global', $this, 'administrator/components/com_testmaker'); ?>
			<?php echo $this->form->getField('idCategory')->renderField(); ?>
		</div>
	</div>
	
	<?php echo $this->form->getField('idTest')->renderField(); ?>
 	<input type="hidden" name="task" value="test.edit">
 	<?php echo JHtml::_('form.token'); ?>
 </form>