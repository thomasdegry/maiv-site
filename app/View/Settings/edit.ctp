<h1>Change website date</h1>

<?php echo $this->Session->flash(); ?>

<div class="settings form">
<?php echo $this->Form->create('Setting'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('type' => 'hidden'));
	?>
		<div class="input text required">
			<input type="text" name="data[Setting][value]" class="datepicker" data-value="<?php echo $this->data["Setting"]["value"]; ?>" />
		</div>
	</fieldset>
<?php echo $this->Form->end(__('Update')); ?>
</div>