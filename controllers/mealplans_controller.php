<?php
class MealplansController extends AppController {

	var $name = 'Mealplans';

	function index() {
		$this->Mealplan->recursive = 0;
		$this->set('mealplans', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mealplan', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mealplan', $this->Mealplan->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Mealplan->create();
			if ($this->Mealplan->save($this->data)) {
				$this->Session->setFlash(__('The mealplan has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mealplan could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Mealplan->User->find('list');
		$recipes = $this->Mealplan->Recipe->find('list');
		$this->set(compact('users', 'recipes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mealplan', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Mealplan->save($this->data)) {
				$this->Session->setFlash(__('The mealplan has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mealplan could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Mealplan->read(null, $id);
		}
		$users = $this->Mealplan->User->find('list');
		$recipes = $this->Mealplan->Recipe->find('list');
		$this->set(compact('users', 'recipes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mealplan', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Mealplan->delete($id)) {
			$this->Session->setFlash(__('Mealplan deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mealplan was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>