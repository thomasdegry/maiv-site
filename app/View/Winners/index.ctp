<section class="orange full-screen gradient-background">
    <div class="container container-small">
        <div class="calendar horizontal-slider-container">
            <h2 class="horizontal-slider-navigation-title">
                Upcoming festivals
            </h2>
            <ul class="calendar-slider horizontal-slider">
                <?php
                    $i = 0;

                    foreach ($winners as $winner) :

                        $additionalClasses = '';

                        if ($i === 0) {
                            $additionalClasses .= 'horizontal-slider-item-shown';
                        }

                        if ($i === 1) {
                            $additionalClasses .= 'horizontal-slider-item-next';
                        }

                ?>
                        <li id="hs-<?php echo $i; ?>" class="calendar-item horizontal-slider-item <?php echo $additionalClasses; ?>">
                            <div>
                                <?php foreach()
                            </div>
                            <h1 class="winner-item-title">
                                <?php echo $winner['Event']['name']; ?>
                            </h1>
                            <ul>
                                <?php foreach($winner['creations'] as $creation): ?>
                                    <li class="circle-picture" style="background: url(http://graph.facebook.com/<?php echo $creation["User"]["id"]; ?>/picture?width=44&amp;height=44);"></li>
                                <?php endforeach; ?> 
                            </ul>
                            <span class="winner-item-ingredients">
                                A tasty burger with
                                
                                <?php
                                    $echostring = '';

                                    for ($i=0; $i < count($winner['creations']) - 1; $i++) { 
                                        $echostring .= $winner['creations'][$i]['Ingredient']['name'] . ',';
                                    }

                                    echo rtrim($echostring, ',');
                                ?>

                                and <?php echo $winner['creations'][count($winners)]['Ingredient']['name']; ?>
                            </span>
                        </li>
                <?php
                    $i++;
                    endforeach;
                ?>
            </ul>
            <a href="#" class="horizontal-slider-previous-button">Previous</a>
            <a href="#" class="horizontal-slider-next-button">Next</a>
        </div>
    </div>
</section>