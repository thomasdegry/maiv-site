<?php
App::uses('AppController', 'Controller');
/**
 * Admins Controller
 *
 * @property Admin $Admin
 */
class AdminsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'login';
		if($this->request->is('post')) {
		    if($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
		    } else {
		         $this->Session->setFlash('Invalid username and password combination', 'bad_flash');
		    }
		} else {
		    if($this->Auth->loggedIn()) {
		         $this->redirect(array('controller' => 'Scan', 'action' => 'overview'));
		    }
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

	public function view($id = null) {
		if (!$this->Admin->exists($id)) {
			throw new NotFoundException(__('Invalid admin'));
		}
		$options = array('conditions' => array('Admin.' . $this->Admin->primaryKey => $id));
		$this->set('admin', $this->Admin->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Admin->create();
			if ($this->Admin->save($this->request->data)) {
				$this->Session->setFlash(__('The admin has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admin could not be saved. Please, try again.'));
			}
		}
	}

	public function edit($id = null) {
		if (!$this->Admin->exists($id)) {
			throw new NotFoundException(__('Invalid admin'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Admin->save($this->request->data)) {
				$this->Session->setFlash(__('The admin has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admin could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Admin.' . $this->Admin->primaryKey => $id));
			$this->request->data = $this->Admin->find('first', $options);
		}
	}

	public function delete($id = null) {
		$this->Admin->id = $id;
		if (!$this->Admin->exists()) {
			throw new NotFoundException(__('Invalid admin'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Admin->delete()) {
			$this->Session->setFlash(__('Admin deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Admin was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
