<div class="push">
    <div class="half">
        <h1>Notifications</h1>

        <p>If business is slowing down, you can send a number of users a push notification that tells them that they still have a burger waiting.</p>

        <?php echo $this->Form->create(null, array('url' => array('controller' => 'Push', 'action' => 'overview'))); ?>
            <?php
                $number = array('5' => '5', '10' => '10', '30' => '30', '50' => '50', '100' => '100', '300' => '300', '500' => '500', '1000' => '1000');
                echo $this->Form->input('size', array('options' => $number, 'default' => '100'));
            ?>
            <?php echo $this->Form->submit('Send push notifications', array('id' => 'btnSendPush')); ?>
        <?php echo $this->Form->end(); ?>
        <?php echo $this->Html->image('admin/loader.gif', array('alt'=> 'loading', 'id' => 'loader')); ?>
    </div>
</div>
