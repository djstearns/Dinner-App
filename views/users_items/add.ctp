<div class="usersItems form">
<?php echo $this->Form->create('UsersItem');?>
	<fieldset>
 		<legend><?php __('Add Users Item'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('item_id');
		echo $this->Form->input('qtyonhand');
		echo $this->Form->input('qtyneeded');
		echo $this->Form->input('pricepaid');
		echo $this->Form->input('purchaseddate');
		echo $this->Form->input('useddate');
		echo $this->Form->input('disposed');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users Items', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>