<div class="mealplansRecipes form">
<?php echo $this->Form->create('MealplansRecipe');?>
	<fieldset>
 		<legend><?php __('Add Mealplans Recipe'); ?></legend>
	<?php
		echo $this->Form->input('mealplan_id');
		echo $this->Form->input('recipe_id');
		echo $this->Form->input('daytocook');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Mealplans Recipes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Mealplans', true), array('controller' => 'mealplans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mealplan', true), array('controller' => 'mealplans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes', true), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe', true), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>