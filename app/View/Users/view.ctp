<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($user['User']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device Token'); ?></dt>
		<dd>
			<?php echo h($user['User']['device_token']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Creations'), array('controller' => 'creations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creation'), array('controller' => 'creations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Creations'); ?></h3>
	<?php if (!empty($user['Creation'])): ?>
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
		foreach ($user['Creation'] as $creation): ?>
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
