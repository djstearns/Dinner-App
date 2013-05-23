<div class="holidaydates index">
	<h2><?php __('Holidaydates');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('category_id');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($holidaydates as $holidaydate):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $holidaydate['Holidaydate']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($holidaydate['Category']['id'], array('controller' => 'categories', 'action' => 'view', $holidaydate['Category']['id'])); ?>
		</td>
		<td><?php echo $holidaydate['Holidaydate']['date']; ?>&nbsp;</td>
		<td><?php echo $holidaydate['Holidaydate']['updated']; ?>&nbsp;</td>
		<td><?php echo $holidaydate['Holidaydate']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $holidaydate['Holidaydate']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $holidaydate['Holidaydate']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $holidaydate['Holidaydate']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $holidaydate['Holidaydate']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Holidaydate', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>