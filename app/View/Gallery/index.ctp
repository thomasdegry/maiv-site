<section class="blurry-background">
    <div class="container gallery">
        <div class="gallery-header column-container has-three-columns">
            <div class="column-container has-two-columns column span-two-columns">
                <p class="gallery-introduction">
                    Rate these burgers and decide<br />
                    which one will become the one<br />
                    and only <span>festival flavour</span>
                </p>
                <form class="gallery-filters">
                    <div class="column span-one-column label-icon-container">
                        <label for="filter-festival" class="label-icon label-icon-dropdown">Filter on festival</label>
                        <select class="form-element" name="filter-festival" id="filter-name">
                            <?php foreach($previousEvents as $e): ?>
                                <?php $selected = ($e['Event']['id'] === $event['Event']['id']); ?>
                                <option value="<?php echo URL . 'gallery/' . $e['Event']['id']; ?>" <?php if ($selected) { echo 'selected'; } ?>>
                                    <?php echo $e['Event']['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="column span-one-column label-icon-container">
                        <label for="filter-name" class="label-icon label-icon-search">Filter on name</label>
                        <input type="text" class="form-element" placeholder="Filter on name" id="filter-name" name="filter-name" />
                    </div>
                </form>
            </div>
            <div class="column span-one-column">
                <div class="gallery-item gallery-item-featured">
                    <h2 class="gallery-item-heading">
                        Couleur Caf&eacute;
                    </h2>
                    <ul class="gallery-item-participants">
                        <li class="circle-picture" style="background-image: url('http://profile.ak.fbcdn.net/hprofile-ak-ash4/203169_1515086493_965016673_q.jpg')">
                            Pieter
                        </li>
                        <li class="circle-picture" style="background-image: url('http://profile.ak.fbcdn.net/hprofile-ak-ash4/203169_1515086493_965016673_q.jpg')">
                            Pieter
                        </li>
                        <li class="circle-picture" style="background-image: url('http://profile.ak.fbcdn.net/hprofile-ak-ash4/203169_1515086493_965016673_q.jpg')">
                            Pieter
                        </li>
                        <li class="circle-picture" style="background-image: url('http://profile.ak.fbcdn.net/hprofile-ak-ash4/203169_1515086493_965016673_q.jpg')">
                            Pieter
                        </li>
                        <li class="circle-picture" style="background-image: url('http://profile.ak.fbcdn.net/hprofile-ak-ash4/203169_1515086493_965016673_q.jpg')">
                            Pieter
                        </li>
                    </ul>
                    <div class="burger gallery-burger">

                    </div>
                </div>
            </div>
        </div>
        <ul class="gallery-grid column-container has-three-columns">
            <?php foreach ($burgers as $burger) : ?>
            <?php $b = $burger['Burger']; ?>
            <?php $c = $burger['Creation']; ?>
            <?php // echo '<pre>'; var_dump(array($b, $c)); echo '</pre>'; die; ?>
            <li class="column span-one-column">
                <div class="gallery-item">
                    <h2 class="gallery-item-heading">
                        #<?php echo $b['id']; ?>
                    </h2>
                    <ul class="gallery-item-participants">
                        <?php foreach ($c as $user) : ?>
                            <li class="circle-picture" style="background-image: url('http://graph.facebook.com/<?php echo $user['user_id']; ?>/picture')"></li>
                        <?php endforeach; ?>
                        <li><a href="http://facebook.com/share.php?s=100&amp;p[url]=http%3A%2F%2Fstudent.howest.be%2Fthomas.degry%2F20122013%2FMAIV%2FFOOD%2Fgallery%2F<?php echo $b['id']; ?>&amp;" class="gallery-share-button">Share</a></li>
                    </ul>
                    <div class="sliding-doors-viewport">
                        <div class="sliding-doors">
                            <div class="sliding-door">
                                <div class="burger gallery-burger">
                                    <?php
                                        foreach ($c as $creation) :
                                            $params = array('class' => 'burger-ingredient');
                                            echo $this->Html->image('ingredients/' . $creation['ingredient_id'] . '.png', $params);
                                        endforeach;
                                    ?>
                                </div>
                                <span class="gallery-item-rating">
                                    4<span>/5</span>
                                </span>
                                <a href="#rate-me" class="button sliding-door-toggle">Rate me!</a>
                            </div>
                            <div class="sliding-door">
                                <div class="rate-container">
                                    <h3 class="rate-heading">Rate this burger</h3>
                                    <span class="rate-subtitle">by clicking the tube</span>
                                    <form class="rate">
                                        <input type="hidden" name="id" value="<?php echo $b['id']; ?>" />
                                        <input type="hidden" name="rating" value="0" />
                                        <a class="rate-plus-button" href="#">Rate</a>
                                        <div class="rate-visual"></div>
                                        <span class="gallery-item-rating rate-rating">
                                            4<span>/5</span>
                                        </span>
                                        <input type="submit" class="button button-confirm" value="Confirm" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="pagination">
            <?php
                echo $this->Paginator->prev('«', array('class' => 'pagination-item pagination-previous', 'escape' => false), null, array('class' => 'pagination-item pagination-previous pagination-item-disabled', 'escape' => false));

                echo $this->Paginator->numbers(array(
                             'class' => 'pagination-item',
                             'separator' => '',
                             'currentClass' => 'pagination-item-active'
                        ));

                echo $this->Paginator->next('»', array('class' => 'pagination-item pagination-next', 'escape' => false), null, array('class' => 'pagination-item pagination-next pagination-item-disabled', 'escape' => false));
            ?>
        </div>
    </div>
</section>