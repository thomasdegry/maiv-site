<?php
    App::uses('AppController', 'Controller');

    class WinnersController extends AppController {
        public function index() {
            $this->loadModel('Event');
            $this->loadModel('Burger');
            $this->loadModel('Creation');

            $winners = $this->Event->query('SELECT mrb_events.name, mrb_burgers.*
                                            FROM mrb_events 
                                            INNER JOIN mrb_burgers
                                                ON mrb_burgers.id = mrb_events.burger_id
                                            WHERE mrb_events.burger_id > 0');
            for ($i=0; $i < count($winners); $i++) { 
                $creations = $this->Creation->query('SELECT mrb_creations.*, mrb_ingredients.* FROM mrb_creations INNER JOIN mrb_ingredients ON mrb_creations.ingredient_id = mrb_ingredients.id WHERE burger_id = ' . $winners[$i]['mrb_burgers']['id']);
                $winners[$i]['mrb_creations'] = $creations;
            }

            // echo '<pre>';
            // print_r($winners);
            // echo '</pre>';
            // die();
            $this->set('winners', $winners);
        }
    }