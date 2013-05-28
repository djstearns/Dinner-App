<div class="yingredients view">
<h2><?php  __('Yingredient');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $yingredient['Yingredient']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Searchvalue'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $yingredient['Yingredient']['searchvalue']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descirption'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $yingredient['Yingredient']['descirption']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Term'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $yingredient['Yingredient']['term']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $yingredient['Yingredient']['updated']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $yingredient['Yingredient']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Yingredient', true), array('action' => 'edit', $yingredient['Yingredient']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Yingredient', true), array('action' => 'delete', $yingredient['Yingredient']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $yingredient['Yingredient']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Yingredients', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Yingredient', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
