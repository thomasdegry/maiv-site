<h1 class="inline-block">Edit event</h1>
<?php echo $this->Html->link("<span class='entypo'>&#59229;</span> Back", array('controller'=>'Events', 'action'=>'overview'), array('class' => 'utility-button', 'escape' => false, 'id' => 'addEvent')); ?>

<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('location');
	?>
	<div class="input text required">
		<input type="text" name="data[Event][start]" class="datepicker" data-value="<?php echo $this->data["Event"]["start"]; ?>" />
	</div>

	<div class="input text required">
		<input type="text" name="data[Event][end]" class="datepicker" data-value="<?php echo $this->data["Event"]["end"]; ?>" />
	</div>
	</fieldset>
<?php echo $this->Form->end(__('Update')); ?>
</div>