<?php
class RecipesYingredientsController extends AppController {

	var $name = 'RecipesYingredients';

	function index() {
		$this->RecipesYingredient->recursive = 0;
		$this->set('recipesYingredients', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid recipes yingredient', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('recipesYingredient', $this->RecipesYingredient->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->RecipesYingredient->create();
			if ($this->RecipesYingredient->save($this->data)) {
				$this->Session->setFlash(__('The recipes yingredient has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipes yingredient could not be saved. Please, try again.', true));
			}
		}
		$yingredients = $this->RecipesYingredient->Yingredient->find('list');
		$recipes = $this->RecipesYingredient->Recipe->find('list');
		$this->set(compact('yingredients', 'recipes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid recipes yingredient', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RecipesYingredient->save($this->data)) {
				$this->Session->setFlash(__('The recipes yingredient has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipes yingredient could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RecipesYingredient->read(null, $id);
		}
		$yingredients = $this->RecipesYingredient->Yingredient->find('list');
		$recipes = $this->RecipesYingredient->Recipe->find('list');
		$this->set(compact('yingredients', 'recipes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for recipes yingredient', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RecipesYingredient->delete($id)) {
			$this->Session->setFlash(__('Recipes yingredient deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Recipes yingredient was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->RecipesYingredient->recursive = 0;
		$this->set('recipesYingredients', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid recipes yingredient', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('recipesYingredient', $this->RecipesYingredient->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->RecipesYingredient->create();
			if ($this->RecipesYingredient->save($this->data)) {
				$this->Session->setFlash(__('The recipes yingredient has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipes yingredient could not be saved. Please, try again.', true));
			}
		}
		$yingredients = $this->RecipesYingredient->Yingredient->find('list');
		$recipes = $this->RecipesYingredient->Recipe->find('list');
		$this->set(compact('yingredients', 'recipes'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid recipes yingredient', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RecipesYingredient->save($this->data)) {
				$this->Session->setFlash(__('The recipes yingredient has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipes yingredient could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RecipesYingredient->read(null, $id);
		}
		$yingredients = $this->RecipesYingredient->Yingredient->find('list');
		$recipes = $this->RecipesYingredient->Recipe->find('list');
		$this->set(compact('yingredients', 'recipes'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for recipes yingredient', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RecipesYingredient->delete($id)) {
			$this->Session->setFlash(__('Recipes yingredient deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Recipes yingredient was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>