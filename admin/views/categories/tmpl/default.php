<?php
  	defined('_JEXEC') or die();
  	JHtml::_('behavior.tooltip');
	JHtml::_('formbehavior.chosen', 'select');
?>

<form action="<?php echo jRoute::_("index.php?option=com_testmaker&view=categories");?>" method="POST" name="adminForm" id="adminForm">

<?php if(!empty($this->sidebar)): ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
<?php endif; ?>

	<div id="j-main-container" class="span10">
	<?php echo JLayoutHelper::render('joomla.searchtools.default', ['view' =>$this]) ?>
		<table class="table table-striped table-hover">
			<thead>
				<th width="3%">
					<?php echo JText::_("COM_TESTMAKER_MENEGER_TEST_TABLE_NUM") ?>
				</th>
				<th width="3%">
					<?php echo JHtml::_("grid.checkall"); ?>
				</th>
				<th width="70%">
					<?php echo JText::_("COM_TESTMAKER_CATEGORY_FIELD_TITLE_LABEL") ?>
				</th>
				<th  width="5%">
					<?php echo JText::_("JSTATUS") ?>
				</th>
				<th  width="5%">
					<?php echo JText::_("COM_TESTMAKER_EDIT") ?>
				</th>
				<th  width="5%">
					<?php echo JText::_("COM_TESTMAKER_DELETE") ?>
				</th>
				<th>
					<?php echo JText::_("COM_TESTMAKER_MENEGER_TEST_TABLE_ID") ?>
				</th>
			</thead>

			<tbody>
				<?php if(!empty($this->items)):?>
		 			<?php $i = 1; ?>
		 			<?php foreach($this->items as $id => $cat):?>
		 				<?php if($cat['name']):?>
						<?php $link = JRoute::_('index.php?option=com_testmaker&task=category.edit&idCategory=' . $id);?>
		 				<tr>
		 					<td>
				 				<?php echo $i; ?>
				 			</td>
				 			<td>
				 				<?php echo JHtml::_('grid.id', $i, $id); ?>
				 			</td>
				 			<td>
				 				<?php echo JHtml::_('link',$link, $cat['name'], array('title'=>JText::_('COM_TESTMAKER_EDIT_CATEGORY')));  ?>
				 			</td>		 			
				 			<td>
				 				<?php echo JHtml::_('jgrid.published', $cat['state'], $i, 'categories.'); ?>
				 			</td>
				 			<td>
				 				<?php echo JHtml::_('jgrid.action', $i, 'edit','category.', 'edit', 'edit category','',FALSE,'apply','', true); ?>
				 			</td>
				 			<td>
				 				<?php echo JHtml::_('jgrid.action', $i, 'delete','categories.', 'delete', 'delete category','',FALSE,'delete','', true); ?>
				 			</td>
				 			<td>
				 				<?php echo $id; ?>
				 			</td>
		 				</tr>
		 				<?php $i++; ?>
		 				<?php endif;?>	
						
		 			<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>

  <input type="hidden" name="task" value="">
  <input type="hidden" name="boxchecked" value="0">
  <?php echo JHtml::_('form.token');?>

</form>