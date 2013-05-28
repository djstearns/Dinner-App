<div class="items index">
	<h2><?php __('Items');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('yingredient_id');?></th>
			<th><?php echo $this->Paginator->sort('upc');?></th>
			<th><?php echo $this->Paginator->sort('avgprice');?></th>
			<th><?php echo $this->Paginator->sort('size');?></th>
			<th><?php echo $this->Paginator->sort('measurement');?></th>
			<th><?php echo $this->Paginator->sort('avglife');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($items as $item):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $item['Item']['id']; ?>&nbsp;</td>
		<td><?php echo $item['Item']['name']; ?>&nbsp;</td>
		<td><?php echo $item['Item']['yingredient_id']; ?>&nbsp;</td>
		<td><?php echo $item['Item']['upc']; ?>&nbsp;</td>
		<td><?php echo $item['Item']['avgprice']; ?>&nbsp;</td>
		<td><?php echo $item['Item']['size']; ?>&nbsp;</td>
		<td><?php echo $item['Item']['measurement']; ?>&nbsp;</td>
		<td><?php echo $item['Item']['avglife']; ?>&nbsp;</td>
		<td><?php echo $item['Item']['updated']; ?>&nbsp;</td>
		<td><?php echo $item['Item']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $item['Item']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $item['Item']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $item['Item']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $item['Item']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Item', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Yingredients', true), array('controller' => 'yingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Yngredient', true), array('controller' => 'yingredients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes', true), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe', true), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>