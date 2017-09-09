<?php
	defined("_JEXEC") or die();
?>
<div class="tm-block">
	<h1><?php echo $this->items[0]->name; ?></h1>

	<?php 
		if(!empty($this->items)){
			$link = JRoute::_('index.php?option=com_testmaker&view=quest');
			echo JHtml::_('link', $link, 'START',["class" => "start btn btn-primary btn-lg"]);
		}

	 ?>

</div>





