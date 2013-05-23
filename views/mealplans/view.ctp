<div class="mealplans view">
<h2><?php  __('Mealplan');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mealplan['Mealplan']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mealplan['Mealplan']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dayslength'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mealplan['Mealplan']['dayslength']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($mealplan['User']['name'], array('controller' => 'users', 'action' => 'view', $mealplan['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mealplan['Mealplan']['updated']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $mealplan['Mealplan']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mealplan', true), array('action' => 'edit', $mealplan['Mealplan']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Mealplan', true), array('action' => 'delete', $mealplan['Mealplan']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mealplan['Mealplan']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mealplans', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mealplan', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes', true), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe', true), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Recipes');?></h3>
	<?php if (!empty($mealplan['Recipe'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Preptime'); ?></th>
		<th><?php __('Cooktime'); ?></th>
		<th><?php __('Servings'); ?></th>
		<th><?php __('Instructions'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Photourl'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th><?php __('Created'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($mealplan['Recipe'] as $recipe):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $recipe['id'];?></td>
			<td><?php echo $recipe['name'];?></td>
			<td><?php echo $recipe['preptime'];?></td>
			<td><?php echo $recipe['cooktime'];?></td>
			<td><?php echo $recipe['servings'];?></td>
			<td><?php echo $recipe['instructions'];?></td>
			<td><?php echo $recipe['user_id'];?></td>
			<td><?php echo $recipe['photourl'];?></td>
			<td><?php echo $recipe['updated'];?></td>
			<td><?php echo $recipe['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'recipes', 'action' => 'view', $recipe['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'recipes', 'action' => 'edit', $recipe['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'recipes', 'action' => 'delete', $recipe['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $recipe['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Recipe', true), array('controller' => 'recipes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
