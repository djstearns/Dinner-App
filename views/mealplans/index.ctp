<div class="mealplans index">
	<h2><?php __('Mealplans');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('dayslength');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($mealplans as $mealplan):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $mealplan['Mealplan']['id']; ?>&nbsp;</td>
		<td><?php echo $mealplan['Mealplan']['name']; ?>&nbsp;</td>
		<td><?php echo $mealplan['Mealplan']['dayslength']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mealplan['User']['name'], array('controller' => 'users', 'action' => 'view', $mealplan['User']['id'])); ?>
		</td>
		<td><?php echo $mealplan['Mealplan']['updated']; ?>&nbsp;</td>
		<td><?php echo $mealplan['Mealplan']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $mealplan['Mealplan']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $mealplan['Mealplan']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $mealplan['Mealplan']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mealplan['Mealplan']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mealplan', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes', true), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe', true), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>