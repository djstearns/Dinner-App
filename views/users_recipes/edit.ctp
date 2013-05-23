<div class="usersRecipes form">
<?php echo $this->Form->create('UsersRecipe');?>
	<fieldset>
 		<legend><?php __('Edit Users Recipe'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('recipe_id');
		echo $this->Form->input('favorite');
		echo $this->Form->input('datecooked');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('UsersRecipe.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('UsersRecipe.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users Recipes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes', true), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe', true), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>