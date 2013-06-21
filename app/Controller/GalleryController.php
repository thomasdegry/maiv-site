<?php
App::uses('AppController', 'Controller');

class GalleryController extends AppController {

    public function index ($event_id = null) {
        $event_id = $event_id;
        if($event_id == null) {
            $this->loadModel('Event');
            $event = $this->viewVars["current_event"];
            if(!empty($event)) {
                $event_id = $event["Event"]["id"];
            }

            $current_date = $this->viewVars["current_date"];
            if(empty($event_id)) {
                $previous_event = $this->Event->find('first', array(
                    'conditions' => array(
                        'Event.end <=' => $current_date
                    )
                ));
                $event_id = $previous_event["Event"]["id"];
            }

        }

        $this->loadModel('Burger');

        $this->paginate = array(
            'conditions' => array('Burger.event_id' => $event_id),
            'limit' => '12',
            'order' => array(
                'Burger.created' => 'DESC'
            )
        );

        $paginated = $this->paginate('Burger');

        if($this->request->is('ajax')) {
            echo json_encode($paginated);
        }

        $this->set('burgers', $paginated);
    }
}
