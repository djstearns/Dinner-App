<?php
class UsersRecipesController extends AppController {

	var $name = 'UsersRecipes';

	function index() {
		$this->UsersRecipe->recursive = 0;
		$this->set('usersRecipes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid users recipe', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('usersRecipe', $this->UsersRecipe->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->UsersRecipe->create();
			if ($this->UsersRecipe->save($this->data)) {
				$this->Session->setFlash(__('The users recipe has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users recipe could not be saved. Please, try again.', true));
			}
		}
		$users = $this->UsersRecipe->User->find('list');
		$recipes = $this->UsersRecipe->Recipe->find('list');
		$this->set(compact('users', 'recipes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid users recipe', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->UsersRecipe->save($this->data)) {
				$this->Session->setFlash(__('The users recipe has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users recipe could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->UsersRecipe->read(null, $id);
		}
		$users = $this->UsersRecipe->User->find('list');
		$recipes = $this->UsersRecipe->Recipe->find('list');
		$this->set(compact('users', 'recipes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for users recipe', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->UsersRecipe->delete($id)) {
			$this->Session->setFlash(__('Users recipe deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Users recipe was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>