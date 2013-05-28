<div class="recipes form">
<?php echo $this->Form->create('Recipe');?>
	<fieldset>
 		<legend><?php __('Edit Recipe'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('preptime');
		echo $this->Form->input('cooktime');
		echo $this->Form->input('servings');
		echo $this->Form->input('instructions');
		echo $this->Form->input('user_id');
		echo $this->Form->input('photourl');
		echo $this->Form->input('Mealplan');
		echo $this->Form->input('Yingredient');
		echo $this->Form->input('Category');
		echo $this->Form->input('Item');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Recipe.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Recipe.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Recipes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mealplans', true), array('controller' => 'mealplans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mealplan', true), array('controller' => 'mealplans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Yingredients', true), array('controller' => 'yingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Yingredient', true), array('controller' => 'yingredients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>