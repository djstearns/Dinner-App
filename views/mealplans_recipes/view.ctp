<div class="mealplansRecipes view">
<h2><?php  __('Mealplans Recipe');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mealplansRecipe['MealplansRecipe']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mealplan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($mealplansRecipe['Mealplan']['name'], array('controller' => 'mealplans', 'action' => 'view', $mealplansRecipe['Mealplan']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Recipe'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($mealplansRecipe['Recipe']['name'], array('controller' => 'recipes', 'action' => 'view', $mealplansRecipe['Recipe']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Daytocook'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mealplansRecipe['MealplansRecipe']['daytocook']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mealplansRecipe['MealplansRecipe']['updated']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mealplansRecipe['MealplansRecipe']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mealplans Recipe', true), array('action' => 'edit', $mealplansRecipe['MealplansRecipe']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Mealplans Recipe', true), array('action' => 'delete', $mealplansRecipe['MealplansRecipe']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mealplansRecipe['MealplansRecipe']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mealplans Recipes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mealplans Recipe', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mealplans', true), array('controller' => 'mealplans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mealplan', true), array('controller' => 'mealplans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes', true), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe', true), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>
