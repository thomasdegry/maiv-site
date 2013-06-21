<?php
App::uses('AppController', 'Controller');

class GalleryController extends AppController {

    public function index ($event_id = null) {
        $event_id = $event_id;
        $current_date = $this->viewVars["current_date"];

        //Check if a event_id was passed to the controller
        if($event_id == null) {
            $this->loadModel('Event');

            //Check if a event is ongoing (set in app controller)
            $event = $this->viewVars["current_event"];
            if(!empty($event)) {
                $event_id = $event["Event"]["id"];
            }

            //No current event so we have to fetch the previosu one to display the creations
            if(empty($event_id)) {
                $previous_event = $this->Event->find('first', array(
                    'conditions' => array(
                        'Event.end <=' => $current_date
                    )
                ));
                $event_id = $previous_event["Event"]["id"];
            }


        }

        //Get previous events for dropdown
        $list_previous_events = $this->Event->find('all', array(
            'conditions' => array(
                'Event.start <=' => $current_date
            ),
            'order' => array(
                'Event.start' => 'DESC'
            )
        ));

        $this->loadModel('Burger');
        $this->Burger->recursive = 1;
        $this->paginate = array(
            'conditions' => array('Burger.event_id' => $event_id),
            'limit' => '12',
            'order' => array(
                'Burger.created' => 'DESC'
            )
        );

        $paginated = $this->paginate('Burger');
        debug($paginated);

        if($this->request->is('ajax')) {
            echo json_encode($paginated);
        }

        // echo '<pre>';
        // debug($paginated);
        // echo '</pre>';
        // die;

        $this->set('burgers', $paginated);
        $this->set('previousEvents', $list_previous_events);
    }
}
