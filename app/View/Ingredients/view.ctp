<div class="ingredients view">
<h2><?php  echo __('Ingredient'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ingredient'), array('action' => 'edit', $ingredient['Ingredient']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ingredient'), array('action' => 'delete', $ingredient['Ingredient']['id']), null, __('Are you sure you want to delete # %s?', $ingredient['Ingredient']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Creations'), array('controller' => 'creations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creation'), array('controller' => 'creations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Creations'); ?></h3>
	<?php if (!empty($ingredient['Creation'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Hamburger Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Ingredient Id'); ?></th>
		<th><?php echo __('Used'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ingredient['Creation'] as $creation): ?>
		<tr>
			<td><?php echo $creation['id']; ?></td>
			<td><?php echo $creation['hamburger_id']; ?></td>
			<td><?php echo $creation['user_id']; ?></td>
			<td><?php echo $creation['ingredient_id']; ?></td>
			<td><?php echo $creation['used']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'creations', 'action' => 'view', $creation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'creations', 'action' => 'edit', $creation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'creations', 'action' => 'delete', $creation['id']), null, __('Are you sure you want to delete # %s?', $creation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Creation'), array('controller' => 'creations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
