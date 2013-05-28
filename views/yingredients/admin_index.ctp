<div class="yingredients index">
	<h2><?php __('Yingredients');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('searchvalue');?></th>
			<th><?php echo $this->Paginator->sort('descirption');?></th>
			<th><?php echo $this->Paginator->sort('term');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($yingredients as $yingredient):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $yingredient['Yingredient']['id']; ?>&nbsp;</td>
		<td><?php echo $yingredient['Yingredient']['searchvalue']; ?>&nbsp;</td>
		<td><?php echo $yingredient['Yingredient']['descirption']; ?>&nbsp;</td>
		<td><?php echo $yingredient['Yingredient']['term']; ?>&nbsp;</td>
		<td><?php echo $yingredient['Yingredient']['updated']; ?>&nbsp;</td>
		<td><?php echo $yingredient['Yingredient']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $yingredient['Yingredient']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $yingredient['Yingredient']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $yingredient['Yingredient']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $yingredient['Yingredient']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Yingredient', true), array('action' => 'add')); ?></li>
	</ul>
</div>