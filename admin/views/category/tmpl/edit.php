<?php 
  defined('_JEXEC') or die();

JHtml::_('behavior.keepalive');
JHtml::_('formbehavior.chosen', 'select');

 ?>

 <form action="<?php echo JRoute::_('index.php?option=com_testmaker&layout=edit&idCategory='.(int)$this->item->idCategory) ?>" method="POST" id="adminForm" name="adminForm" class="form-validate">
	
	<div class="row-fluid">
		<div class="span9">

			<?php 
			echo JLayoutHelper::render('edit.title_alias', $this, 'administrator/components/com_testmaker'); 
			?>
		</div>
		<div class="span3">
			<?php echo JLayoutHelper::render('edit.global', $this, 'administrator/components/com_testmaker'); ?>
		</div>
	</div>
	
	<?php echo $this->form->getField('idCategory')->renderField(); ?>

 	<input type="hidden" name="task" value="category.edit">
 	<?php echo JHtml::_('form.token'); ?>
 </form>