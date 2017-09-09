<?php 
	defined('_JEXEC') or die();
	JHtml::_('formbehavior.chosen', 'select');
	$session = JFactory::getSession();
	$app = JFactory::getApplication();
	$keyIdQuestion = 'com_testmaker.test.mytest.idQuestion';

	$id = intval($app->getUserState($keyIdQuestion));
	
 ?>

 <form action="<?php echo JRoute::_('index.php?option=com_testmaker&layout=edit&idAnswer='.(int)$this->item->idAnswer.'&idQuestion='.$id) ?>" method="POST" id="adminForm" name="adminForm" class="form-validate">
	
	<div class="row-fluid">
		<div class="span9">
			<fieldset class="adminform">
					<?php echo $this->form->getInput('textAnswer'); ?>
				</fieldset>
		</div>
		<div class="span3">
			<?php echo JLayoutHelper::render('edit.global', $this, 'administrator/components/com_testmaker'); ?>
			
		</div>
	</div>
	
	<?php echo $this->form->getField('idAnswer')->renderField(); ?>
	<?php echo $this->form->getField('idQuestion')->renderField(); ?>
 	<input type="hidden" name="task" value="answer.edit">
 	<?php echo JHtml::_('form.token'); ?>
 </form>