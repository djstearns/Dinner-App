<div class="recipesYingredients form">
<?php echo $this->Form->create('RecipesYingredient');?>
	<fieldset>
 		<legend><?php __('Edit Recipes Yingredient'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('yingredient_id');
		echo $this->Form->input('recipe_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('RecipesYingredient.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('RecipesYingredient.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Recipes Yingredients', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Yingredients', true), array('controller' => 'yingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Yingredient', true), array('controller' => 'yingredients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes', true), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe', true), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>