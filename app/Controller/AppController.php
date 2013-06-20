<?php

class AppController extends Controller {
    public $helpers = array('Html', 'Paginator', 'js');

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'Pages', 'action' => 'display'),
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
        $this->Auth->allow('index', 'login', 'display', 'add');
        $this->set('current_user', $this->Auth->user());
        // if(!($this->Auth->user('priviliges') == 'webmaster' || $this->Auth->user('priviliges') == 'admin')) {
        //        //Defaultset toegelaten:
        //        $this->Auth->allow('index', 'view', 'read', 'filter');
        // }
    }

}
