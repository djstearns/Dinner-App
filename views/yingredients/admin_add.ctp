<div class="yingredients form">
<?php echo $this->Form->create('Yingredient');?>
	<fieldset>
 		<legend><?php __('Admin Add Yingredient'); ?></legend>
	<?php
		echo $this->Form->input('searchvalue');
		echo $this->Form->input('descirption');
		echo $this->Form->input('term');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Yingredients', true), array('action' => 'index'));?></li>
	</ul>
</div>