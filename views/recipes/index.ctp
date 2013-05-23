<div class="recipes index">
	<h2><?php __('Recipes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('preptime');?></th>
			<th><?php echo $this->Paginator->sort('cooktime');?></th>
			<th><?php echo $this->Paginator->sort('servings');?></th>
			<th><?php echo $this->Paginator->sort('instructions');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('photourl');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($recipes as $recipe):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $recipe['Recipe']['id']; ?>&nbsp;</td>
		<td><?php echo $recipe['Recipe']['name']; ?>&nbsp;</td>
		<td><?php echo $recipe['Recipe']['preptime']; ?>&nbsp;</td>
		<td><?php echo $recipe['Recipe']['cooktime']; ?>&nbsp;</td>
		<td><?php echo $recipe['Recipe']['servings']; ?>&nbsp;</td>
		<td><?php echo $recipe['Recipe']['instructions']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($recipe['User']['name'], array('controller' => 'users', 'action' => 'view', $recipe['User']['id'])); ?>
		</td>
		<td><?php echo $recipe['Recipe']['photourl']; ?>&nbsp;</td>
		<td><?php echo $recipe['Recipe']['updated']; ?>&nbsp;</td>
		<td><?php echo $recipe['Recipe']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $recipe['Recipe']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $recipe['Recipe']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $recipe['Recipe']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $recipe['Recipe']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Recipe', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mealplans', true), array('controller' => 'mealplans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mealplan', true), array('controller' => 'mealplans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>