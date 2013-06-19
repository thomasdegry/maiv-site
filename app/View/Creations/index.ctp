<div class="creations index">
	<h2><?php echo __('Creations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('hamburger_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ingredient_id'); ?></th>
			<th><?php echo $this->Paginator->sort('used'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($creations as $creation): ?>
	<tr>
		<td><?php echo h($creation['Creation']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($creation['Hamburger']['id'], array('controller' => 'burgers', 'action' => 'view', $creation['Hamburger']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($creation['User']['name'], array('controller' => 'users', 'action' => 'view', $creation['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($creation['Ingredient']['name'], array('controller' => 'ingredients', 'action' => 'view', $creation['Ingredient']['id'])); ?>
		</td>
		<td><?php echo h($creation['Creation']['used']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $creation['Creation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $creation['Creation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $creation['Creation']['id']), null, __('Are you sure you want to delete # %s?', $creation['Creation']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Creation'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Burgers'), array('controller' => 'burgers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hamburger'), array('controller' => 'burgers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
	</ul>
</div>
