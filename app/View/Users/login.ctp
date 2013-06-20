
<div id="login">
     <h1>Login</h1>
     <?php echo $this->Session->flash('auth'); ?>
     <?php echo $this->Form->create(); ?>
          <?php
               echo $this->Form->input('user_id', array(
                    'label' => false,
                    'placeholder' => __('user_id'),
                    'type' => 'text'
               ));
               echo $this->Form->input('password', array(
                    'label' => false,
                    'placeholder' => __('Wachtwoord')
               ));
          ?>
          <?php echo $this->Html->link("Back to home", array('controller'=>'Pages', 'action'=>'display'), array('class' => 'utility-button')); ?>
          <?php echo $this->Form->submit('Log in'); ?>
     <?php echo $this->Form->end(); ?>
</div>