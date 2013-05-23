<div class="usersRecipes index">
	<h2><?php __('Users Recipes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('recipe_id');?></th>
			<th><?php echo $this->Paginator->sort('favorite');?></th>
			<th><?php echo $this->Paginator->sort('datecooked');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($usersRecipes as $usersRecipe):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $usersRecipe['UsersRecipe']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($usersRecipe['User']['name'], array('controller' => 'users', 'action' => 'view', $usersRecipe['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($usersRecipe['Recipe']['name'], array('controller' => 'recipes', 'action' => 'view', $usersRecipe['Recipe']['id'])); ?>
		</td>
		<td><?php echo $usersRecipe['UsersRecipe']['favorite']; ?>&nbsp;</td>
		<td><?php echo $usersRecipe['UsersRecipe']['datecooked']; ?>&nbsp;</td>
		<td><?php echo $usersRecipe['UsersRecipe']['updated']; ?>&nbsp;</td>
		<td><?php echo $usersRecipe['UsersRecipe']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $usersRecipe['UsersRecipe']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $usersRecipe['UsersRecipe']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $usersRecipe['UsersRecipe']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $usersRecipe['UsersRecipe']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Users Recipe', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes', true), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe', true), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>