<div class="recipes view">
<h2><?php  __('Recipe');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recipe['Recipe']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recipe['Recipe']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Preptime'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recipe['Recipe']['preptime']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cooktime'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recipe['Recipe']['cooktime']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Servings'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recipe['Recipe']['servings']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Instructions'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recipe['Recipe']['instructions']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($recipe['User']['name'], array('controller' => 'users', 'action' => 'view', $recipe['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Photourl'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recipe['Recipe']['photourl']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recipe['Recipe']['updated']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $recipe['Recipe']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Recipe', true), array('action' => 'edit', $recipe['Recipe']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Recipe', true), array('action' => 'delete', $recipe['Recipe']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $recipe['Recipe']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mealplans', true), array('controller' => 'mealplans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mealplan', true), array('controller' => 'mealplans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Yingredients', true), array('controller' => 'yingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Yingredient', true), array('controller' => 'yingredients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Mealplans');?></h3>
	<?php if (!empty($recipe['Mealplan'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Dayslength'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th><?php __('Created'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($recipe['Mealplan'] as $mealplan):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $mealplan['id'];?></td>
			<td><?php echo $mealplan['name'];?></td>
			<td><?php echo $mealplan['dayslength'];?></td>
			<td><?php echo $mealplan['user_id'];?></td>
			<td><?php echo $mealplan['updated'];?></td>
			<td><?php echo $mealplan['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'mealplans', 'action' => 'view', $mealplan['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'mealplans', 'action' => 'edit', $mealplan['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'mealplans', 'action' => 'delete', $mealplan['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $mealplan['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Mealplan', true), array('controller' => 'mealplans', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Yingredients');?></h3>
	<?php if (!empty($recipe['Yingredient'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Searchvalue'); ?></th>
		<th><?php __('Descirption'); ?></th>
		<th><?php __('Term'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th><?php __('Created'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($recipe['Yingredient'] as $yingredient):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $yingredient['id'];?></td>
			<td><?php echo $yingredient['searchvalue'];?></td>
			<td><?php echo $yingredient['descirption'];?></td>
			<td><?php echo $yingredient['term'];?></td>
			<td><?php echo $yingredient['updated'];?></td>
			<td><?php echo $yingredient['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'yingredients', 'action' => 'view', $yingredient['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'yingredients', 'action' => 'edit', $yingredient['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'yingredients', 'action' => 'delete', $yingredient['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $yingredient['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Yingredient', true), array('controller' => 'yingredients', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Categories');?></h3>
	<?php if (!empty($recipe['Category'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Ctype Id'); ?></th>
		<th><?php __('Short Description'); ?></th>
		<th><?php __('Long Description'); ?></th>
		<th><?php __('Search Value'); ?></th>
		<th><?php __('Flavor Value'); ?></th>
		<th><?php __('Unitsvalue'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th><?php __('Created'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($recipe['Category'] as $category):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $category['id'];?></td>
			<td><?php echo $category['ctype_id'];?></td>
			<td><?php echo $category['short_description'];?></td>
			<td><?php echo $category['long_description'];?></td>
			<td><?php echo $category['search_value'];?></td>
			<td><?php echo $category['flavor_value'];?></td>
			<td><?php echo $category['unitsvalue'];?></td>
			<td><?php echo $category['updated'];?></td>
			<td><?php echo $category['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'categories', 'action' => 'view', $category['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'categories', 'action' => 'edit', $category['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'categories', 'action' => 'delete', $category['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $category['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Items');?></h3>
	<?php if (!empty($recipe['Item'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Yingredient Id'); ?></th>
		<th><?php __('Upc'); ?></th>
		<th><?php __('Avgprice'); ?></th>
		<th><?php __('Size'); ?></th>
		<th><?php __('Measurement'); ?></th>
		<th><?php __('Avglife'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th><?php __('Created'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($recipe['Item'] as $item):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $item['id'];?></td>
			<td><?php echo $item['name'];?></td>
			<td><?php echo $item['yingredient_id'];?></td>
			<td><?php echo $item['upc'];?></td>
			<td><?php echo $item['avgprice'];?></td>
			<td><?php echo $item['size'];?></td>
			<td><?php echo $item['measurement'];?></td>
			<td><?php echo $item['avglife'];?></td>
			<td><?php echo $item['updated'];?></td>
			<td><?php echo $item['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'items', 'action' => 'view', $item['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'items', 'action' => 'edit', $item['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'items', 'action' => 'delete', $item['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $item['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Users');?></h3>
	<?php if (!empty($recipe['User'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Role Id'); ?></th>
		<th><?php __('Username'); ?></th>
		<th><?php __('Password'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Email'); ?></th>
		<th><?php __('Website'); ?></th>
		<th><?php __('Activation Key'); ?></th>
		<th><?php __('Image'); ?></th>
		<th><?php __('Bio'); ?></th>
		<th><?php __('Timezone'); ?></th>
		<th><?php __('Status'); ?></th>
		<th><?php __('Updated'); ?></th>
		<th><?php __('Created'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($recipe['User'] as $user):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $user['id'];?></td>
			<td><?php echo $user['role_id'];?></td>
			<td><?php echo $user['username'];?></td>
			<td><?php echo $user['password'];?></td>
			<td><?php echo $user['name'];?></td>
			<td><?php echo $user['email'];?></td>
			<td><?php echo $user['website'];?></td>
			<td><?php echo $user['activation_key'];?></td>
			<td><?php echo $user['image'];?></td>
			<td><?php echo $user['bio'];?></td>
			<td><?php echo $user['timezone'];?></td>
			<td><?php echo $user['status'];?></td>
			<td><?php echo $user['updated'];?></td>
			<td><?php echo $user['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'users', 'action' => 'delete', $user['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
