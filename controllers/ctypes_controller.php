<?php
class CtypesController extends AppController {

	var $name = 'Ctypes';

	function index() {
		$this->Ctype->recursive = 0;
		$this->set('ctypes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ctype', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('ctype', $this->Ctype->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Ctype->create();
			if ($this->Ctype->save($this->data)) {
				$this->Session->setFlash(__('The ctype has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ctype could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ctype', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Ctype->save($this->data)) {
				$this->Session->setFlash(__('The ctype has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ctype could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Ctype->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ctype', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Ctype->delete($id)) {
			$this->Session->setFlash(__('Ctype deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ctype was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>