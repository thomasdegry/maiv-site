<div class="creations view">
<h2><?php  echo __('Creation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($creation['Creation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hamburger'); ?></dt>
		<dd>
			<?php echo $this->Html->link($creation['Hamburger']['id'], array('controller' => 'burgers', 'action' => 'view', $creation['Hamburger']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($creation['User']['name'], array('controller' => 'users', 'action' => 'view', $creation['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ingredient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($creation['Ingredient']['name'], array('controller' => 'ingredients', 'action' => 'view', $creation['Ingredient']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Used'); ?></dt>
		<dd>
			<?php echo h($creation['Creation']['used']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Creation'), array('action' => 'edit', $creation['Creation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Creation'), array('action' => 'delete', $creation['Creation']['id']), null, __('Are you sure you want to delete # %s?', $creation['Creation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Creations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Burgers'), array('controller' => 'burgers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hamburger'), array('controller' => 'burgers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
	</ul>
</div>
