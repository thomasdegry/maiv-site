<?php
    App::uses('AppController', 'Controller');

    class WinnersController extends AppController {
        public function index() {
            $this->loadModel('Event');
            $this->loadModel('Burger');
            $options = array(
                'conditions' => array(
                    'not' => array(
                        'Event.burger_id' => 0
                    )
                )
            );
            $winners = $this->Event->find('all', $options);

            $this->loadModel('Creation');
            for ($i=0; $i < count($winners); $i++) { 
                $options = array(
                    'conditions' => array(
                        'Burger.id' => $winners[$i]["Event"]["burger_id"]
                    )
                );
                $this->Creation->recursive = 0;
                $creations = $this->Creation->find('all', $options);
                $winners[$i]["creations"] = $creations;
                
            }
            
            $this->set('winners', $winners);
        }
    }