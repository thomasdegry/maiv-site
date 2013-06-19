<?php
App::uses('AppController', 'Controller');
/**
 * Creations Controller
 *
 * @property Creation $Creation
 */
class CreationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Creation->recursive = 0;
		$this->set('creations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Creation->exists($id)) {
			throw new NotFoundException(__('Invalid creation'));
		}
		$options = array('conditions' => array('Creation.' . $this->Creation->primaryKey => $id));
		$this->set('creation', $this->Creation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Creation->create();
			if ($this->Creation->save($this->request->data)) {
				$this->Session->setFlash(__('The creation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The creation could not be saved. Please, try again.'));
			}
		}
		$hamburgers = $this->Creation->Hamburger->find('list');
		$users = $this->Creation->User->find('list');
		$ingredients = $this->Creation->Ingredient->find('list');
		$this->set(compact('hamburgers', 'users', 'ingredients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Creation->exists($id)) {
			throw new NotFoundException(__('Invalid creation'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Creation->save($this->request->data)) {
				$this->Session->setFlash(__('The creation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The creation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Creation.' . $this->Creation->primaryKey => $id));
			$this->request->data = $this->Creation->find('first', $options);
		}
		$hamburgers = $this->Creation->Hamburger->find('list');
		$users = $this->Creation->User->find('list');
		$ingredients = $this->Creation->Ingredient->find('list');
		$this->set(compact('hamburgers', 'users', 'ingredients'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Creation->id = $id;
		if (!$this->Creation->exists()) {
			throw new NotFoundException(__('Invalid creation'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Creation->delete()) {
			$this->Session->setFlash(__('Creation deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Creation was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
