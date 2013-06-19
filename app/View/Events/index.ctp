<section class="orange full-screen gradient-background">
    <div class="container container-small">
        <div class="calendar horizontal-slider-container">
            <h2 class="horizontal-slider-navigation-title">
                Upcoming festivals
            </h2>
            <ol class="horizontal-slider-navigation">
                <?php
                $i = 0;
                    foreach ($events as $e) :
                    $event = $e['Event'];
                ?>
                    <li>
                        <a href="#hs-<?php echo $i; ?>" class="horizontal-slider-navigation-item <?php echo ($i === 0) ? 'horizontal-slider-navigation-item-active' : ''; ?>"><?php echo date('d/m', strtotime($event['start']))?></a>
                    </li>
                <?php
                    $i++;
                    endforeach;
                ?>
            </ol>
            <ul class="calendar-slider horizontal-slider">
                <?php
                    $i = 0;

                    foreach ($events as $e) :
                        $event = $e['Event'];

                        $additionalClasses = '';

                        if ($i === 0) {
                            $additionalClasses .= 'horizontal-slider-item-shown';
                        }

                        if ($i === 1) {
                            $additionalClasses .= 'horizontal-slider-item-next';
                        }

                ?>
                        <li id="hs-<?php echo $i; ?>" class="calendar-item horizontal-slider-item <?php echo $additionalClasses; ?>">
                            <h1 class="calendar-item-title">
                                <?php echo $event['name']; ?>
                            </h1>
                            <span class="calendar-item-subtitle">
                                <?php echo $event['location']; ?>
                            </span>
                            <a href="#" class="calendar-item-add">
                                Add to iCal
                            </a>
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