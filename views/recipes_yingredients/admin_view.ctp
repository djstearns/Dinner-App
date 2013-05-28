<div class="recipesYingredients view">
<h2><?php  __('Recipes Yingredient');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recipesYingredient['RecipesYingredient']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Yingredient'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($recipesYingredient['Yingredient']['id'], array('controller' => 'yingredients', 'action' => 'view', $recipesYingredient['Yingredient']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Recipe'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($recipesYingredient['Recipe']['name'], array('controller' => 'recipes', 'action' => 'view', $recipesYingredient['Recipe']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recipesYingredient['RecipesYingredient']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recipesYingredient['RecipesYingredient']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Recipes Yingredient', true), array('action' => 'edit', $recipesYingredient['RecipesYingredient']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Recipes Yingredient', true), array('action' => 'delete', $recipesYingredient['RecipesYingredient']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $recipesYingredient['RecipesYingredient']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes Yingredients', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipes Yingredient', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Yingredients', true), array('controller' => 'yingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Yingredient', true), array('controller' => 'yingredients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes', true), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe', true), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>
