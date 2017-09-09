<?php
	defined("_JEXEC") or die();

?>
<div class="tm-block">
<h1>Тесты</h1>

<?php 
	if(is_array($this->items)){
		foreach($this->items as $item): ?>
		<p class="tests-links">
			<?php $link = JRoute::_('index.php?option=com_testmaker&view=test&idTest='.$item->idTest);?>
		<?php echo JHtml::_('link', $link, $item->name); ?>
		</p>
		
</div>
<?php
	endforeach;
	}

 ?>