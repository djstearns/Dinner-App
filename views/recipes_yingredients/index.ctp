<div class="recipesYingredients index">
	<h2><?php __('Recipes Yingredients');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('yingredient_id');?></th>
			<th><?php echo $this->Paginator->sort('recipe_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($recipesYingredients as $recipesYingredient):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $recipesYingredient['RecipesYingredient']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($recipesYingredient['Yingredient']['id'], array('controller' => 'yingredients', 'action' => 'view', $recipesYingredient['Yingredient']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($recipesYingredient['Recipe']['name'], array('controller' => 'recipes', 'action' => 'view', $recipesYingredient['Recipe']['id'])); ?>
		</td>
		<td><?php echo $recipesYingredient['RecipesYingredient']['created']; ?>&nbsp;</td>
		<td><?php echo $recipesYingredient['RecipesYingredient']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $recipesYingredient['RecipesYingredient']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $recipesYingredient['RecipesYingredient']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $recipesYingredient['RecipesYingredient']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $recipesYingredient['RecipesYingredient']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Recipes Yingredient', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Yingredients', true), array('controller' => 'yingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Yingredient', true), array('controller' => 'yingredients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes', true), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe', true), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>