<?php 
	defined('_JEXEC') or die();
	JHtml::_('formbehavior.chosen', 'select');
 ?>

 <form action="<?php echo JRoute::_('index.php?option=com_testmaker&layout=edit&idQuestion='.(int)$this->item->idQuestion) ?>" method="POST" id="adminForm" name="adminForm" class="form-validate">
	
	<div class="row-fluid">
		<div class="span9">
			<?php echo JLayoutHelper::render('edit.title_alias', $this, 'administrator/components/com_testmaker'); ?>
			<?php echo $this->form->getField('textQuestion')->renderField(); ?>
		</div>
		<div class="span3">
			<?php echo JLayoutHelper::render('edit.global', $this, 'administrator/components/com_testmaker'); ?>
			<?php echo $this->form->getField('idTest')->renderField(); ?>
		</div>
	</div>
	
	<?php echo $this->form->getField('idQuestion')->renderField(); ?>

 	<input type="hidden" name="task" value="question.edit">
 	<?php echo JHtml::_('form.token'); ?>
 </form>