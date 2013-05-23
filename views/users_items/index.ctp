<div class="usersItems index">
	<h2><?php __('Users Items');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('item_id');?></th>
			<th><?php echo $this->Paginator->sort('qtyonhand');?></th>
			<th><?php echo $this->Paginator->sort('qtyneeded');?></th>
			<th><?php echo $this->Paginator->sort('pricepaid');?></th>
			<th><?php echo $this->Paginator->sort('purchaseddate');?></th>
			<th><?php echo $this->Paginator->sort('useddate');?></th>
			<th><?php echo $this->Paginator->sort('disposed');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($usersItems as $usersItem):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $usersItem['UsersItem']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($usersItem['User']['name'], array('controller' => 'users', 'action' => 'view', $usersItem['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($usersItem['Item']['name'], array('controller' => 'items', 'action' => 'view', $usersItem['Item']['id'])); ?>
		</td>
		<td><?php echo $usersItem['UsersItem']['qtyonhand']; ?>&nbsp;</td>
		<td><?php echo $usersItem['UsersItem']['qtyneeded']; ?>&nbsp;</td>
		<td><?php echo $usersItem['UsersItem']['pricepaid']; ?>&nbsp;</td>
		<td><?php echo $usersItem['UsersItem']['purchaseddate']; ?>&nbsp;</td>
		<td><?php echo $usersItem['UsersItem']['useddate']; ?>&nbsp;</td>
		<td><?php echo $usersItem['UsersItem']['disposed']; ?>&nbsp;</td>
		<td><?php echo $usersItem['UsersItem']['updated']; ?>&nbsp;</td>
		<td><?php echo $usersItem['UsersItem']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $usersItem['UsersItem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $usersItem['UsersItem']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $usersItem['UsersItem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $usersItem['UsersItem']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Users Item', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>