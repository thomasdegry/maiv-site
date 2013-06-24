<section class="orange full-screen gradient-background">
    <div class="container container-small">
        <h1 class="winners-title">Winning flavours</h1>
        <div class="calendar horizontal-slider-container">
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
                        <li id="hs-<?php echo $i; ?>" class="horizontal-slider-item-winners horizontal-slider-item <?php echo $additionalClasses; ?>">
                            <div class="burger-left">
                                <div class="burger">
                                    <?php
                                        foreach($winner['mrb_creations'] as $creation) {
                                            echo $this->Html->image('ingredients/' . $creation['mrb_ingredients']['id'] . '.png');
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="burger-right">
                                <h2 class="winner-item-title">
                                    <?php echo $winner['mrb_events']['name']; ?>
                                </h2>

                                <span class="winner-item-ingredients">
                                    A tasty burger with
                                    <?php
                                        $echostring = '';

                                        for ($j = 0; $j < count($winner['mrb_creations']) - 1; $j++) {
                                            $echostring .= $winner['mrb_creations'][$j]['mrb_ingredients']['name'] . ', ';
                                        }

                                        echo rtrim($echostring, ',  ');
                                    ?>

                                    and <?php $last = end($winner['mrb_creations']); echo $last['mrb_ingredients']['name']; ?>
                                </span>
                                <ul>
                                    <?php foreach($winner['mrb_creations'] as $creation): ?>
                                    <li class="circle-picture" style="background: url(http://graph.facebook.com/<?php echo $creation["mrb_creations"]["user_id"]; ?>/picture?width=44&amp;height=44);"></li>
                                    <?php endforeach; ?>
                                </ul>

                            </div>
                            <div class="clear"></div>
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