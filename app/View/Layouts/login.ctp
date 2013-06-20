<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
<body class="login">

    <div id="content">
        <div class="container">
            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
    <?php echo $this->Html->script(array('vendor/underscore.js', 'vendor/grid.js', 'vendor/version.js', 'vendor/detector.js', 'vendor/formatinf.js', 'vendor/errorlevel.js', 
    'vendor/bitmat.js', 'vendor/datablock.js', 'vendor/bmparser.js', 'vendor/datamask.js', 'vendor/rsdecoder.js',
    'vendor/rsdecoder.js', 'vendor/gf256poly.js', 'vendor/gf256.js', 'vendor/decoder.js', 'vendor/qrcode.js', 'vendor/findpat.js',
    'vendor/alignpat.js', 'vendor/databr.js', 'vendor/jquery.js', 'vendor/timeago.js', 'vendor/picker.js', 'vendor/picker.date.js', 'admin.js')); ?></body>
</html>
