<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 */
class EventsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Event->recursive = 0;
		$events = $this->Event->find('all');
		$this->set('events', $events);
	}

/**
 * overview method
 *
 * @return void
 */
	public function overview() {
		$this->layout = 'admin';
		$this->Event->recursive = 0;
		$this->paginate = array(
	        'limit' => 10
	    );

		$this->set('events', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'admin';
		if ($this->request->is('post')) {
			$this->Event->create();
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('Your event has been saved successfully'), 'good_flash');
				$this->redirect(array('action' => 'overview'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'bad_flash');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'admin';
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash('Your event has been updated', 'good_flash');
				$this->redirect(array('action' => 'overview'));
			} else {
				$this->Session->setFlash('Your event could not be updated, please try again');
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Event->delete()) {
			$this->Session->setFlash('Your event has been deleted.', 'good_flash');
			$this->redirect(array('action' => 'overview'));
		}
		$this->Session->setFlash('Could not delete this event..', 'bad_flash');
		$this->redirect(array('action' => 'overview'));
	}
}
