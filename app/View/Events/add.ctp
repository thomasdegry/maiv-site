<h1 class="inline-block">Add an event</h1>
<?php echo $this->Html->link("<span class='entypo'>&#59229;</span> Back", array('controller'=>'Events', 'action'=>'overview'), array('class' => 'utility-button', 'escape' => false, 'id' => 'addEvent')); ?>

<?php echo $this->Session->flash(); ?>

<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<?php
		echo $this->Form->input('name', array('placeholder' => 'Event name'));
		echo $this->Form->input('location', array('placeholder' => 'Location'));
		echo $this->Form->input('start', array('type' => 'text', 'placeholder' => 'Start date', 'class' => 'datepicker'));
		echo $this->Form->input('end', array('type' => 'text', 'placeholder' => 'End date', 'class' => 'datepicker'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
