<select name="event_filter" id="eventFilter">
    <?php foreach($previous_events as $event): ?>
        <option value="<?php echo $event['Event']['id']; ?>"><?php echo $event['Event']['name']; ?></option>
    <?php endforeach; ?>
</select>
<div><?php echo $this->Paginator->prev('Previous', array('class' => 'prev', 'escape' => false), null, array('class' => 'prev disabled', 'escape' => false)); ?></div>
<div><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, {:count} events found in total'))); ?></div>
<div><?php echo $this->Paginator->next('Next', array('class' => 'prev', 'escape' => false), null, array('class' => 'next disabled', 'escape' => false)); ?></div>