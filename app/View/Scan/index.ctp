<h1>Payment Scanner</h1> 

<div id="scan">
    <div id="webcam"></div>
    <div id="outdiv"><?php echo $this->Html->image('admin/lame.png', array('alt'=> 'notRunning')); ?></div>
    <canvas id="qr-canvas" width="800" height="600"></canvas>
</div>

<div id="scan-log">
    <a href="#" id="startCam" class="big-button-orange">Start Scanning</a>
    <ul class="hide">
        <li>Scanning<span id="dots"></span></li>
        <li>Payment of Tatiana was successful <span class="timeago">30 seconds ago</span></li>
        <li>Payment of Tatiana was successful <span class="timeago">30 seconds ago</span></li>
        <li>Payment of Tatiana was successful <span class="timeago">30 seconds ago</span></li>
        <li>Payment of Tatiana was successful <span class="timeago">30 seconds ago</span></li>
        <li>Payment of Tatiana was successful <span class="timeago">30 seconds ago</span></li>
    </ul>
</div>
