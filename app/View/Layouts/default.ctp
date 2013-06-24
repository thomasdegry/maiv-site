<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php echo $this->Html->meta('icon', $this->Html->url('/favicon.ico')); ?>
    <title><?php echo $title_for_layout; ?></title>
<!--     <link href="css/screen.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/vendor/modernizr.js"></script>
 -->
    <?php echo $this->Html->meta('icon', $this->Html->url('/favicon.png')); ?>
    <?php
        echo $this->Html->css(array('screen'));

        echo $this->Html->script('vendor/modernizr');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body class="<?php if ($this->action !== 'display' && $this->name !== 'pages') { echo 'show-logo'; } ?>">
<header class="site-header">
    <div class="container">
        <a href="#" title="" class="circle-logo">Mr. Burger Festival Food</a>
        <nav class="horizontal-nav">
            <ul>
                <li <?php if($this->name == 'Pages') {echo 'class="active"';} ?> >
                    <?php echo $this->Html->link('The Campaign', array('controller' => 'pages', 'action' => 'display'), array('class' => 'nav-item')); ?>
                </li>
                <li <?php if($this->name == 'Gallery') {echo 'class="active"';} ?> >
                    <?php echo $this->Html->link('Burger Pile', array('controller' => 'gallery', 'action' => 'index'), array('class' => 'nav-item')); ?>
                </li>
                <li <?php if($this->name == 'Winners') {echo 'class="active"';} ?> >
                    <?php echo $this->Html->link('Festival Flavours', array('controller' => 'winners', 'action' => 'index'), array('class' => 'nav-item')); ?>
                </li>
                <li <?php if($this->name == 'Events') {echo 'class="active"';} ?> >
                    <?php echo $this->Html->link('Festivals', array('controller' => 'events', 'action' => 'index'), array('class' => 'nav-item')); ?>
                </li>
            </ul>
        </nav>
    </div>
</header>

<div id="site-wrapper">
    <?php
        switch ($this->name) {
            case 'Gallery':
                $currentPage = 'Burger Pile';
                break;

            case 'Winners':
                $currentPage = 'Festival Flavours';
                break;

            case 'Events':
                $currentPage = 'Festivals';
                break;

            case 'Pages':
            default:
                $currentPage = 'The Campaign';
                break;
        }
    ?>
    <a href="#sidr-main" class="toggle-nav">&#9776; <span class="current-page"><?php echo $currentPage; ?></span></a>
    <div id="site">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
        <?php echo $this->element('sql_dump'); ?>
        <footer class="site-footer">
            <div class="container column-container has-three-columns">
                <div class="column span-one-column">
                    <h6>
                        <a href="#" class="mr-burger">Mr Burger</a>
                    </h6>
                    <p>
                        Mr Burger is a food truck dedicated to delivering the best tasting burgers to the people of Melbourne. Our mission is to bring a quality experience to eating burgers, wherever our trucks are parked. </p>
                    <p>
                        <a href="" class="prefixed-link">mrburger.com.au</a>
                    </p>
                </div>
                <div class="column span-one-column hide-mobile">
                    <!-- <h6 class="heading-twitter-bird">On Twitter</h6> -->
                    <h6 class="livefeed"></h6>
                    <ul class="feed">
                        <li>
                            <img class="feed-profile-picture circle-picture tatiana" />
                            <div class="feed-content">
                                <h2 class="feed-user">@tatsvc</h2>
                                <p>Su-per-toff!!!</p>
                            </div>
                        </li>
                        <li>
                            <img class="feed-profile-picture circle-picture thomas" />
                            <div class="feed-content">
                                <h2 class="feed-user">@thomasDegry</h2>
                                <p>Wow, incredible campaign! I will never forget this!</p>
                            </div>
                        </li>
                        <li>
                            <img class="feed-profile-picture circle-picture tatiana" />
                            <div class="feed-content">
                                <h2 class="feed-user">@tatsvc</h2>
                                <p>Wow, this is amazing!</p>
                            </div>
                        </li>
                        <li>
                            <img class="feed-profile-picture circle-picture pieter" />
                            <div class="feed-content">
                                <h2 class="feed-user">@pieterBeulque</h2>
                                <p>Wat kunnen wij niet hé!?</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="column span-one-column hide-mobile">
                    <!-- <h6 class="heading-stats">Mr. Nerd!</h6> -->
                    <h6 class="statistics"></h6>
                    <dl class="stats">
                        <dt class="stat-item stat-item-facebook">
                            F
                        </dt>
                        <dd class="stat-number stat-number-facebook">
                            3401834
                        </dd>
                        <dt class="stat-item stat-item-twitter">
                            T
                        </dt>
                        <dd class="stat-number stat-number-twitter">
                            3401834
                        </dd>
                        <dt class="stat-item stat-item-downloads">
                            D
                        </dt>
                        <dd class="stat-number stat-number-downloads">
                            3401834
                        </dd>
                    </dl>
                </div>
            </div>
            <div class="copyright orange">
                <div class="container column-container has-three-columns">
                    <div class="column span-one-column">
                       <a href="http://student.howest.be/tatiana.van.campen1/20122013/MAIV/SOUNDBOARD/"> A <span class="dreamteam"></span> production</a>
                    </div>
                    <div class="column span-one-column hide-mobile">
                        Be your fucking best!
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<?php if ($this->name === 'Gallery') : ?>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '197361027085761',
      channelUrl : '//localhost/channel.html',
      status     : true,
      xfbml      : true
    });

    // Additional initialization code such as adding Event Listeners goes here
  };

  // Load the SDK asynchronously
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<?php endif; ?>

    <?php echo $this->Html->script(array('vendor/jquery.js', 'vendor/underscore.js', 'vendor/jquery.sidr.min.js', 'vendor/fastclick.js', 'vendor/jquery.lettering-0.6.1.min.js',
'vendor/jquery.scrollorama.js', 'main.js')); ?>
</body>
</html>