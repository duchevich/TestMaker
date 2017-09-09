<?php
  	defined('_JEXEC') or die();
  	JHtml::_('behavior.tooltip');
	JHtml::_('formbehavior.chosen', 'select');
	$session = JFactory::getSession();
	$app = JFactory::getApplication();
	$keyIdQuestion = 'com_testmaker.test.mytest.idQuestion';

	$app = JFactory::getApplication();
	if($app->input->getInt('idQuestion')){
		$id = $app->input->getInt('idQuestion');
		$app->setUserState($keyIdQuestion, $id);
	}
	
?>


<form action="<?php echo jRoute::_("index.php?option=com_testmaker&view=answers");?>" method="POST" name="adminForm" id="adminForm">

<?php if(!empty($this->sidebar)): ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
<?php endif; ?>

	<div id="j-main-container" class="span10">
		<table class="table table-striped table-hover">
			<thead>
				<th width="3%">
					<?php echo JText::_("COM_TESTMAKER_MENEGER_TEST_TABLE_NUM") ?>
				</th>
				<th width="3%">
					<?php echo JHtml::_("grid.checkall"); ?>
				</th>
				<th width="50%">
					<?php echo JText::_("COM_TESTMAKER_ANSWER_FIELD_TITLE_LABEL") ?>
				</th>
				<th width="10%">
					<?php echo JText::_("COM_TESTMAKER_QUESTION_FIELD_TITLE_LABEL") ?>
				</th>
				<th width="10%">
					<?php echo JText::_("COM_TESTMAKER_TEST_FIELD_TITLE_LABEL") ?>
				</th>
				<th width="10%">
					<?php echo JText::_("COM_TESTMAKER_ANSWER_FIELD_RIGHT") ?>
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
		 			<?php foreach($this->items as $key => $item):?>
		 				<?php if($item->textAnswer):?>
						<?php $link = JRoute::_('index.php?option=com_testmaker&task=answer.edit&idAnswer=' . $item->idAnswer);?>
						<?php $linkQuestion = JRoute::_('index.php?option=com_testmaker&task=question.edit&idQuestion=' . $item->idQuestion);?>
						<?php $linkTest = JRoute::_('index.php?option=com_testmaker&task=test.edit&idTest=' . $item->idTest);?>
		 				<tr>
		 					<td>
				 				<?php echo $i; ?>
				 			</td>
				 			<td>
				 				<?php echo JHtml::_('grid.id',  $key, $item->idAnswer); ?>
				 			</td>
				 			<td>
				 				<?php echo JHtml::_('link',$link, $item->textAnswer);  ?>
				 			</td>
				 			<td>
				 				<?php echo JHtml::_('link',$linkQuestion, $item->nameQuestion);  ?>
				 			</td>
				 			<td>
				 				<?php echo JHtml::_('link',$linkTest, $item->nameTest);  ?>
				 			</td>		 			
				 			<td>
								<?php echo TestMakerHelper::rightAnswer($item->valueAnsver, $key, 'answers.', true); ?>
				 			</td>
				 			<td>
				 				<?php echo JHtml::_('jgrid.published', $item->state, $key, 'answers.'); ?>
				 			</td>
				 			<td>
				 				<?php echo JHtml::_('jgrid.action', $key, 'edit','answer.', 'edit', 'edit answer','',FALSE,'apply','', true); ?>
				 			</td>
				 			<td>
				 				<?php echo JHtml::_('jgrid.action', $key, 'delete','answers.', 'delete', 'delete answer','',FALSE,'delete','', true); ?>
				 			</td>
				 			<td>
				 				<?php echo $item->idAnswer; ?>
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