<div class="creations form">
<?php echo $this->Form->create('Creation'); ?>
	<fieldset>
		<legend><?php echo __('Edit Creation'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('hamburger_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('ingredient_id');
		echo $this->Form->input('used');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Creation.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Creation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Creations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Burgers'), array('controller' => 'burgers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hamburger'), array('controller' => 'burgers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
	</ul>
</div>
