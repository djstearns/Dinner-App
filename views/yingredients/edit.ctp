<div class="yingredients form">
<?php echo $this->Form->create('Yingredient');?>
	<fieldset>
 		<legend><?php __('Edit Yingredient'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Yingredient.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Yingredient.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Yingredients', true), array('action' => 'index'));?></li>
	</ul>
</div>