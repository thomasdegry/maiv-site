<div class="burgers view">
<h2><?php  echo __('Burger'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($burger['Burger']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($burger['Burger']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($burger['Event']['name'], array('controller' => 'events', 'action' => 'view', $burger['Event']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Burger'), array('action' => 'edit', $burger['Burger']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Burger'), array('action' => 'delete', $burger['Burger']['id']), null, __('Are you sure you want to delete # %s?', $burger['Burger']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Burgers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Burger'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
