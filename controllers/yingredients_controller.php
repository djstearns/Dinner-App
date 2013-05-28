<?php
class YingredientsController extends AppController {

	var $name = 'Yingredients';

	function index() {
		$this->Yingredient->recursive = 0;
		$this->set('yingredients', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid yingredient', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('yingredient', $this->Yingredient->read(null, $id));
	}

	
	function add() {
		if (!empty($this->data)) {
			$this->Yingredient->create();
			if ($this->Yingredient->save($this->data)) {
				$this->Session->setFlash(__('The yingredient has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The yingredient could not be saved. Please, try again.', true));
			}
		}
	}
	

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid yingredient', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Yingredient->save($this->data)) {
				$this->Session->setFlash(__('The yingredient has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The yingredient could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Yingredient->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for yingredient', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Yingredient->delete($id)) {
			$this->Session->setFlash(__('Yingredient deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Yingredient was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Yingredient->recursive = 0;
		$this->set('yingredients', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid yingredient', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('yingredient', $this->Yingredient->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Yingredient->create();
			if ($this->Yingredient->save($this->data)) {
				$this->Session->setFlash(__('The yingredient has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The yingredient could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid yingredient', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Yingredient->save($this->data)) {
				$this->Session->setFlash(__('The yingredient has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The yingredient could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Yingredient->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for yingredient', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Yingredient->delete($id)) {
			$this->Session->setFlash(__('Yingredient deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Yingredient was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>