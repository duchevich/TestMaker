<?php
	defined('_JEXEC') or die();
	JHtml::_('behavior.tooltip');
	JHtml::_('formbehavior.chosen', 'select');

?>

<form action="<?php echo jRoute::_("index.php?option=com_testmaker&view=tests");?>" method="POST" name="adminForm" id="adminForm">

<?php if(!empty($this->sidebar)): ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar ?>
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
			<?php echo JHtml::_('grid.checkall'); ?>
		</th>
		<th width="50%">
			<?php echo JText::_("COM_TESTMAKER_TEST_FIELD_TITLE_LABEL") ?>
		</th>
		<th width="20%">
			<?php echo JText::_("COM_TESTMAKER_TEST_FIELD_CATEGORY_LABEL") ?>
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
		<th >
			<?php echo JText::_("COM_TESTMAKER_MENEGER_TEST_TABLE_ID") ?>
		</th>
	</thead>
	<tbody>
		<?php if(!empty($this->items)) :?>
 			<?php $i = 1; ?>
 			<?php foreach($this->items as $key => $item) :?>
 				<tr>
 					<td>
		 				<?php echo $this->pagination->getRowOffset($key); ?>
		 			</td>
		 			<td>
		 				<?php echo JHtml::_('grid.id', $key, $item->idTest) ?>
		 			</td>
		 			<td>
		 			<?php $link = JRoute::_('index.php?option=com_testmaker&task=test.edit&idTest='.$item->idTest);?>
		 				
		 				<?php echo JHtml::_('link', $link, $item->name); ?>
		 			</td>
		 			<td>
		 				<?php echo $item->nameCategory; ?>
		 			</td>
		 			<td>
		 				<?php echo JHtml::_('jgrid.published', $item->state, $key, 'tests.');?>
		 			</td>
		 			<td>
		 				<?php echo JHtml::_('jgrid.action', $key, 'edit','test.', 'edit', 'edit test','',FALSE,'apply','', true); ?>
		 			</td>
		 			<td>
		 				<?php echo JHtml::_('jgrid.action', $key, 'delete','tests.', 'delete', 'delete test','',FALSE,'delete','', true); ?>
		 			</td>
		 			<td>
		 				<?php echo $item->idTest;?>
		 			</td>
 				</tr>
 				<?php $i++;?>
 			<?php endforeach;?>
 		
 		<?php endif;?>
	</tbody>
</table>


  <input type="hidden" name="task" value="">
  <input type="hidden" name="boxchecked" value="0">
  <?php echo JHtml::_('form.token')?>
  </div>
</form>