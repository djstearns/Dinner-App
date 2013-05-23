<div class="holidaydates form">
<?php echo $this->Form->create('Holidaydate');?>
	<fieldset>
 		<legend><?php __('Edit Holidaydate'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Holidaydate.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Holidaydate.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Holidaydates', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>