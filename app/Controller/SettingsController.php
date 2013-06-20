<?php
App::uses('AppController', 'Controller');
/**
 * Settings Controller
 *
 * @property Setting $Setting
 */
class SettingsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function overview() {
		$this->layout = 'admin';
		$this->Setting->recursive = 0;
		$this->set('settings', $this->paginate());
	}

	public function edit($id = null) {
		$this->layout = 'admin';
		if (!$this->Setting->exists($id)) {
			throw new NotFoundException(__('Invalid setting'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Setting->save($this->request->data)) {
				$this->Session->setFlash(__('The setting has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The setting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
			$this->request->data = $this->Setting->find('first', $options);
		}
	}

}
