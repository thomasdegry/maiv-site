<div id="login">
     <h1>Login</h1>
     <div class="hide">
          <?php echo $this->Session->flash('auth'); ?>
          <?php echo $this->Form->create(); ?>
               <?php
                    echo $this->Form->input('username', array(
                         'label' => false,
                         'placeholder' => __('username'),
                         'type' => 'text',
                         'id' => 'username'
                    ));
                    echo $this->Form->input('password', array(
                         'label' => false,
                         'id' => 'password',
                         'placeholder' => __('Wachtwoord')
                    ));
               ?>
               <?php echo $this->Html->link("Back to home", array('controller'=>'Pages', 'action'=>'display'), array('class' => 'utility-button')); ?>
               <?php echo $this->Form->submit('Log in'); ?>
          <?php echo $this->Form->end(); ?>
     </div>

     <div id="scan">
          <div id="webcam"></div>
         <div id="outdiv"><?php echo $this->Html->image('admin/badge.png', array('alt'=> 'notRunning')); ?></div>
         <canvas id="qr-canvas" width="800" height="600"></canvas>
     </div>
     <a href="#" id="startCam" class="big-button-orange">Start Scanning</a>
     <?php echo $this->Html->link("<span class='entypo'>&#59229;</span> Back", array('controller'=>'Pages', 'action'=>'display'), array('class' => 'utility-button', 'escape' => false)); ?>
</div>