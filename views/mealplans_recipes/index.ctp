<div class="mealplansRecipes index">
	<h2><?php __('Mealplans Recipes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('mealplan_id');?></th>
			<th><?php echo $this->Paginator->sort('recipe_id');?></th>
			<th><?php echo $this->Paginator->sort('daytocook');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($mealplansRecipes as $mealplansRecipe):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mealplansRecipe['MealplansRecipe']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mealplansRecipe['Mealplan']['name'], array('controller' => 'mealplans', 'action' => 'view', $mealplansRecipe['Mealplan']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($mealplansRecipe['Recipe']['name'], array('controller' => 'recipes', 'action' => 'view', $mealplansRecipe['Recipe']['id'])); ?>
		</td>
		<td><?php echo $mealplansRecipe['MealplansRecipe']['daytocook']; ?>&nbsp;</td>
		<td><?php echo $mealplansRecipe['MealplansRecipe']['updated']; ?>&nbsp;</td>
		<td><?php echo $mealplansRecipe['MealplansRecipe']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mealplansRecipe['MealplansRecipe']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mealplansRecipe['MealplansRecipe']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mealplansRecipe['MealplansRecipe']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mealplansRecipe['MealplansRecipe']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Mealplans Recipe', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Mealplans', true), array('controller' => 'mealplans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mealplan', true), array('controller' => 'mealplans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes', true), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe', true), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>