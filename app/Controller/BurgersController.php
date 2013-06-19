<?php
App::uses('AppController', 'Controller');
/**
 * Burgers Controller
 *
 * @property Burger $Burger
 */
class BurgersController extends AppController {

	public function index() {

	}

/**
 * index method
 *
 * @return void
 */
	public function overview() {
		// $this->layout = 'admin';
		// $this->Burger->recursive = 0;
		// $this->set('burgers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Burger->exists($id)) {
			throw new NotFoundException(__('Invalid burger'));
		}
		$options = array('conditions' => array('Burger.' . $this->Burger->primaryKey => $id));
		$this->set('burger', $this->Burger->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Burger->create();
			if ($this->Burger->save($this->request->data)) {
				$this->Session->setFlash(__('The burger has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The burger could not be saved. Please, try again.'));
			}
		}
		$events = $this->Burger->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Burger->exists($id)) {
			throw new NotFoundException(__('Invalid burger'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Burger->save($this->request->data)) {
				$this->Session->setFlash(__('The burger has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The burger could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Burger.' . $this->Burger->primaryKey => $id));
			$this->request->data = $this->Burger->find('first', $options);
		}
		$events = $this->Burger->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Burger->id = $id;
		if (!$this->Burger->exists()) {
			throw new NotFoundException(__('Invalid burger'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Burger->delete()) {
			$this->Session->setFlash(__('Burger deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Burger was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
