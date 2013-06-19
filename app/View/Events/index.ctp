<section class="orange full-screen gradient-background">
    <div class="container container-small">
        <div class="calendar horizontal-slider-container">
            <h2 class="horizontal-slider-navigation-title">
                Upcoming festivals
            </h2>
            <ol class="horizontal-slider-navigation">
                <?php foreach ($events as $e) : ?>
                <?php $event = $e['Event']; ?>
                    <li>
                        <a href="#" class="horizontal-slider-navigation-item"><?php echo date('d/m', strtotime($event['start']))?></a>
                    </li>
                <?php endforeach; ?>
            </ol>
            <ul class="calendar-slider horizontal-slider">
                <?php foreach ($events as $e) : ?>
                <?php $event = $e['Event']; ?>
                <li class="calendar-item horizontal-slider-item">
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
                <?php endforeach; ?>
            </ul>
            <a href="#" class="horizontal-slider-previous-button">Previous</a>
            <a href="#" class="horizontal-slider-next-button">Next</a>
        </div>
    </div>
</section>