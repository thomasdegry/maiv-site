<?php
App::uses('AppController', 'Controller');

class GalleryController extends AppController {

    public function index ($eventID = null)
    {
        $this->loadModel('Event');

        $currentDate = $this->viewVars["current_date"];

        if ((int) $eventID === 0) {
            $event = $this->viewVars['current_event'];

            if (empty($this->viewVars['current_event'])) {
                $event = $this->Event->find('first', array(
                    'conditions' => array(
                        'Event.end <=' => $currentDate
                    ),
                    'order' => array(
                        'Event.end' => 'DESC'
                    )
                ));
            }
        } else {
            $event = $this->Event->find('first', array(
                'conditions' => array(
                    'Event.id' => $eventID
                )
            ));
        }

        //Get previous events for dropdown
        $list_previous_events = $this->Event->find('all', array(
            'conditions' => array(
                'Event.start <=' => $currentDate
            ),
            'order' => array(
                'Event.start' => 'DESC'
            )
        ));

        $this->loadModel('Burger');
        $this->Burger->recursive = 1;
        $this->paginate = array(
            'conditions' => array('Burger.event_id' => $event['Event']['id']),
            'limit' => '6',
            'order' => array(
                'Burger.created' => 'DESC'
            )
        );

        $paginated = $this->paginate('Burger');

        // if($this->request->is('ajax')) {
        //     echo json_encode($paginated);
        // }

        $this->set('burgers', $paginated);
        $this->set('event', $event);
        $this->set('previousEvents', $list_previous_events);

        if($this->request->is('ajax')) {
            $this->layout = 'ajax';
        }
    }
}
