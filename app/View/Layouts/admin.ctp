<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <?php echo $this->Html->charset(); ?>
    <title>
        Mr Burger Administration | 
        <?php echo $title_for_layout; ?>
    </title>
    <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css(array('admin/screen.css', 'admin/default.css', 'admin/default.date.css'));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <a href="#" title="" class="circle-logo">Mr. Burger Festival Food</a>
            <nav class="horizontal-nav">
                <ul>
                    <li <?php if($this->name == 'Scan') {echo 'class="active"';} ?>>
                        <?php echo $this->Html->link("Payment System", array('controller'=>'Scan', 'action'=>'overview'), array('class' => 'nav-item')); ?>
                    </li>
                    <li <?php if($this->name == 'Events') {echo 'class="active"';} ?>>
                        <?php echo $this->Html->link("Events", array('controller' => 'Events', 'action' => 'overview'), array('class' => 'nav-item')); ?>
                    </li>
                    <li <?php if($this->name == 'Settings') {echo 'class="active"';} ?>>
                        <?php echo $this->Html->link("Website", array('controller' => 'Settings', 'action' => 'edit', '1'), array('class' => 'nav-item')); ?>
                    </li>
                    <li <?php if($this->name == 'Push') {echo 'class="active"';} ?>>
                        <?php echo $this->Html->link("Push", array('controller' => 'Push', 'action' => 'overview'), array('class' => 'nav-item')); ?>
                    </li>
                </ul>
            </nav>
            <div id="user">
                <p>
                    Justine Lerno
                    <?php echo $this->Html->link("Log out", array('controller'=>'', 'action'=>'')); ?>
                </p>
                <?php echo $this->Html->image('admin/users/justine.png', array('alt'=> 'loggedInUser')); ?>
            </div>
        </div>
    </header>

    <div id="content">
        <div class="container">
            <?php echo $this->fetch('content'); ?>
        </div>
    </div>

    <div id="stats">
        <div class="container column-container has-three-columns">
            <div class="column span-one-column">
                <h2>3.712 burgers</h2>
                <span>were already created</span>
            </div>
            <div class="column span-one-column">
                <h2>4.281 users</h2>
                <span>opened the app at least once</span>
            </div>
            <div class="column span-one-column">
                <h2>64.495 lines of code</h2>
                <span>written so far</span>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="half" id="production">
                <p>A Dreamteam Production</p>
            </div>
            <div class="half" id="copyright">
                <p>Be your fucking best!</p>
            </div>
        </div>
    </footer>

    <?php echo $this->element('sql_dump'); ?>
    <?php echo $this->Html->script(array('vendor/underscore.js', 'vendor/grid.js', 'vendor/version.js', 'vendor/detector.js', 'vendor/formatinf.js', 'vendor/errorlevel.js', 
    'vendor/bitmat.js', 'vendor/datablock.js', 'vendor/bmparser.js', 'vendor/datamask.js', 'vendor/rsdecoder.js',
    'vendor/rsdecoder.js', 'vendor/gf256poly.js', 'vendor/gf256.js', 'vendor/decoder.js', 'vendor/qrcode.js', 'vendor/findpat.js',
    'vendor/alignpat.js', 'vendor/databr.js', 'vendor/jquery.js', 'vendor/timeago.js', 'vendor/picker.js', 'vendor/picker.date.js', 'admin.js')); ?>
</body>
</html>
