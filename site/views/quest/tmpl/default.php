<?php
	defined("_JEXEC") or die();

	$session = JFactory::getSession();
	$app = JFactory::getApplication();

	$keyFinishTest = 'com_testmaker.test.mytest.finishTest';

	$finishTest = $app->getUserState($keyFinishTest);
	if($finishTest){
		$count = count($this->items);
		$sum = 0;
		if($this->items){
			foreach($this->items as $item){
			$sum+= (int)$item->valueAnsver;
			}
		}
		
		$persent = intval($sum / $count * 100);
?>
<div class="tm-block">
	<h1>Результаты теста</h1>

	<h2>Правильные ответы: <?php echo $sum; ?></h2>

	<h2>Неправильные ответы: <?php echo ($count - $sum); ?></h2>

	<h2>Количество правильных ответов: <?php echo $persent; ?>%</h2>

</div>


<?php
	}
	else{
?>
<div class="tm-block">
<h1><?php echo $this->items[0]->name; ?></h1>

<form action="<?php echo JRoute::_('index.php?option=com_testmaker&view=quest');?>" method="POST" id="questForm" name="questForm" class="form-validate">
	<div class="quest-block">
		<?php if($this->items): ?>
			<?php foreach($this->items as $item): ?>
				<div class="row">
					<div class="col-md-1 radio">
						<input type="radio" name="answerId" value="<?php echo $item->idAnswer; ?>">
					</div>
					<div class="col-md-11 text">
						<?php echo $item->textAnswer; ?>
					</div>
				</div>	
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<input class="next btn btn-primary btn-lg" type="submit" style="display: none;" value="NEXT">

	<input type="hidden" name="boxchecked" value="0">
 </form>
	</div>
<?php
	}
?>
