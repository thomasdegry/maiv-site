<div class="events index">
	<h1><?php echo __('Events'); ?></h1>

	<table cellpadding="0" cellspacing="0">
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
				<td><?php echo h($event['Event']['start']); ?>&nbsp;</td>
				<td><?php echo h($event['Event']['end']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link('&#9998;', array('action' => 'edit', $event['Event']['id']), array('class' => 'entypo', 'escape' => false)); ?>
					<?php echo $this->Form->postLink('&#10060;', array('action' => 'delete', $event['Event']['id']), array('class' => 'entypo', 'escape' => false), __('Are you sure you want to delete # %s?', $event['Event']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>

	</table>

	<div id="tfoot">
		<div><?php echo $this->Paginator->prev('&#59229;', array(), null, array('class' => 'prev disabled', 'escape' => false)); ?></div>
		<div><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, {:count} events found in total'))); ?></div>
		<div><?php echo $this->Paginator->next('&#59230;', array(), null, array('class' => 'next disabled', 'escape' => false)); ?></div>
	</div>
</div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Event'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Burgers'), array('controller' => 'burgers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Burger'), array('controller' => 'burgers', 'action' => 'add')); ?> </li>
	</ul>
</div> -->
