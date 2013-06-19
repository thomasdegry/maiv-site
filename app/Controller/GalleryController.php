<?php
App::uses('AppController', 'Controller');

class GalleryController extends AppController {

    public function index ($eventID = 0) {
        $this->loadModel('Burger');

        // if ($this->request->is('ajax')) {
        //     echo json_encode $burgers:
        //     exit;
        // }

        $params = ($eventID > 0) ? array('conditions' => array('event_id' => $eventID)) : array();

        $burgers = $this->Burger->find('all', $params);
        $this->set('burgers', $burgers);
        debug($burgers);
    }
}
