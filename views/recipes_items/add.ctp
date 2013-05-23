<div class="recipesItems form">
<?php echo $this->Form->create('RecipesItem');?>
	<fieldset>
 		<legend><?php __('Add Recipes Item'); ?></legend>
	<?php
		echo $this->Form->input('recipe_id');
		echo $this->Form->input('item_id');
		echo $this->Form->input('itemqty');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Recipes Items', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Recipes', true), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe', true), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>