<section class="orange full-screen gradient-background">

    <div class="feature-slider-container">
        <div id="next-event">
            <?php
                $now = time(); // or your date as well
                $start_date = strtotime($this->viewVars["next_event"]["event"]["start"]);
                $datediff = $now - $start_date;
                $daysDifference = floor($datediff/(60*60*24));
            ?>
            <h3>
                <?php echo abs($daysDifference); ?>
                <span>
                    <?php
                        if ($daysDifference == 1) {
                            echo 'day';
                        } else {
                            echo 'days';
                        }
                    ?>
                </span>
            </h3>
            <h4><span>until</span> <?php echo $this->viewVars['next_event']['event']["name"]; ?></h4>
        </div>

        <a href="#" class="mr-burger-appstore">Download Mr Burger&rsquo;s Festi Food</a>
        <div class="feature-slider">
            <div class="feature">
                <div class="feature-graphic">
                    <div id="iphone-startscreen">
                        <div class="iphone-gif"></div>
                    </div>
                    <div id="mayonaisse" style="display: none; right: -100%;"></div>
                </div>
                <div class="feature-slogan">
                    Be social, create a new<br /><span>flavour</span> and get a free burger!
                </div>
            </div>
        </div>
        <ol class="feature-slider-navigation">
            <li>
                <a href="#feature-slider" class="feature-slider-navigation-item"></a>
            </li>
            <li>
                <a href="#feature-slider" class="feature-slider-navigation-item"></a>
            </li>
        </ol>

        <div class="scroll-indicator">
            <div class="scroll-indicator-ball"></div>
            <div class="scroll-indicator-shadow"></div>
        </div>
    </div>
</section>


<section class="full-width-image"></section>
<section class="beige full-screen app-demo app-demo-1 app-demo-start scrollblock">
    <div class="container">
        <div class="app-demo-1-info" id="block1">
            <h1>How it works</h1>
            <div class="appstore-logo"></div>
            <div class="arrow-down"></div>
        </div>
    </div>
</section>

<section class="orange full-screen app-demo app-demo-2 scrollblock scrollblock">
    <div class="container">
        <div class="app-demo-2-info" id="block2">
            <h1>Visit a festival</h1>
        </div>
        <div class="app-demo-2-info2">
            <div class="festival-location" id="block3">
                <h1>MELBOURNE MUSIC WEEK</h1>
                <h2>Melbourne mill</h2>
            </div>
            <div class="festival-location" id="block4">
                <h1>JAZZ FESTIVAL</h1>
                <h2>Melbourne Manatee Zoo</h2>
            </div>
            <div class="festival-location" id="block5">
                <h1>SYDNEY SOLAR</h1>
                <h2>Syndey</h2>
            </div>
        </div>
    </div>
</section>

<section class="beige full-screen app-demo app-demo-3 blocks scrollblock">
    <div class="container">
    <div class="app-demo-3-info">
        <div class="mrburger burger-receipt burger-01" id="block6"></div>
        <div class="mrburger burger-receipt burger-02" id="block7"></div>
        <div class="mrburger burger-receipt burger-03" id="block8"></div>
    </div>
    <div class="app-demo-3-info2" id="block9">
        <h1>Check Out Our Burgers</h1>
    </div>

    </div>
</section>
<section class="orange full-screen app-demo app-demo-4 video-container app-demo-end">
    <div class="btn-play">PLAY</div>
    <div class="container">
        <video controls preload="true" autobuffer width="1280" id="mrburgervideo">
            <source src="media/_main3.webm" type="video/webm" />
            <source src="media/_main3.mp4" type="video/mp4" />
            <source src="media/_main3.theora.ogv" type="video/ogv" />
        </video>
    </div>
</section>