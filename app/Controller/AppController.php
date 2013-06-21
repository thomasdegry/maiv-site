<?php

class AppController extends Controller {
    public $helpers = array('Html', 'Paginator', 'js');
    public $current_date;
    public $current_event;

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'Admins', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'Pages', 'action' => 'display'),
            'authError' => 'You have to be login to visit this page',
            //'authorize' => array('Controller'),
            'authenticate' => array(
                'Form' => array(
                     'userModel' => 'Admin'
                ),
            ),
            'All' => array('userModel' => 'Admin'),
            'userModel' => 'Admin',
            'loginAction' => 'admins/index'
        )
     );

    function beforeFilter() {
        $this->loadModel('Setting');
        $current_date = $this->Setting->find();
        $this->set('current_date', $current_date["Setting"]["value"]);

        $next_event = array();
        $this->loadModel('Event');
        $options = array(
            'conditions' => array(
                'Event.start <= ' => $current_date["Setting"]["value"],
                'Event.end >= ' => $current_date["Setting"]["value"]
            )
        );
        $this->Event->recursive = 0;
        $current_event = $this->Event->find('first', $options);
        $this->set('current_event', $current_event);

        if(!empty($current_event)) {
            $next_event["event"] = $current_event["Event"];
            $next_event["now"] = true;
        } else {
            $options = array(
                'conditions' => array(
                    'Event.start >= ' => $current_date["Setting"]["value"]
                )
            );
            $next = $this->Event->find('first', $options);
            $next_event["event"] = $next["Event"];
            $next_event["now"] = false;
        }
        $this->set('next_event', $next_event);

        $this->Auth->allow('index', 'login', 'display', 'add');
        $this->set('current_user', $this->Auth->user());
    }

}
