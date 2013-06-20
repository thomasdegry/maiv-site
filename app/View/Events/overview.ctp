<div class="events index">
	<h1 class="inline-block"><?php echo __('Events'); ?></h1>
	<?php echo $this->Html->link("Add <span class='entypo'>&#10133;</span>", array('controller'=>'Events', 'action'=>'add'), array('class' => 'utility-button', 'escape' => false, 'id' => 'addEvent')); ?>

    <?php echo $this->Session->flash(); ?>

	<table cellpadding="0" cellspacing="0" class="style">
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('start'); ?></th>
			<th><?php echo $this->Paginator->sort('end'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($events as $event): ?>
			<tr>
				<td><?php echo h($event['Event']['id']); ?>&nbsp;</td>
				<td><?php echo h($event['Event']['name']); ?>&nbsp;</td>
				<td><?php echo date('d-m-Y', strtotime(h($event['Event']['start']))); ?>&nbsp;</td>
				<td><?php echo date('d-m-Y', strtotime(h($event['Event']['end']))); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link('&#9998;', array('action' => 'edit', $event['Event']['id']), array('class' => 'entypo', 'escape' => false)); ?>
					<?php echo $this->Form->postLink('&#10060;', array('action' => 'delete', $event['Event']['id']), array('class' => 'entypo', 'escape' => false), __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>

	</table>

	<div id="tfoot">
		<div><?php echo $this->Paginator->prev('&#59229;', array('class' => 'prev', 'escape' => false), null, array('class' => 'prev disabled', 'escape' => false)); ?></div>
		<div><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, {:count} events found in total'))); ?></div>
		<div><?php echo $this->Paginator->next('&#59230;', array('class' => 'prev', 'escape' => false), null, array('class' => 'next disabled', 'escape' => false)); ?></div>
	</div>
</div>