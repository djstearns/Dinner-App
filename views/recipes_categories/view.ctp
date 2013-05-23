<div class="recipesCategories view">
<h2><?php  __('Recipes Category');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recipesCategory['RecipesCategory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Recipe'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($recipesCategory['Recipe']['name'], array('controller' => 'recipes', 'action' => 'view', $recipesCategory['Recipe']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Category'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($recipesCategory['Category']['id'], array('controller' => 'categories', 'action' => 'view', $recipesCategory['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recipesCategory['RecipesCategory']['updated']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recipesCategory['RecipesCategory']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Recipes Category', true), array('action' => 'edit', $recipesCategory['RecipesCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Recipes Category', true), array('action' => 'delete', $recipesCategory['RecipesCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $recipesCategory['RecipesCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes Categories', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipes Category', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes', true), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe', true), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
