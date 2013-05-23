<div class="holidaydates view">
<h2><?php  __('Holidaydate');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $holidaydate['Holidaydate']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Category'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($holidaydate['Category']['id'], array('controller' => 'categories', 'action' => 'view', $holidaydate['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $holidaydate['Holidaydate']['date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $holidaydate['Holidaydate']['updated']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $holidaydate['Holidaydate']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Holidaydate', true), array('action' => 'edit', $holidaydate['Holidaydate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Holidaydate', true), array('action' => 'delete', $holidaydate['Holidaydate']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $holidaydate['Holidaydate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Holidaydates', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holidaydate', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
