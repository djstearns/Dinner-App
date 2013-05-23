<?php
class RecipesCategoriesController extends AppController {

	var $name = 'RecipesCategories';

	function index() {
		$this->RecipesCategory->recursive = 0;
		$this->set('recipesCategories', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid recipes category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('recipesCategory', $this->RecipesCategory->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->RecipesCategory->create();
			if ($this->RecipesCategory->save($this->data)) {
				$this->Session->setFlash(__('The recipes category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipes category could not be saved. Please, try again.', true));
			}
		}
		$recipes = $this->RecipesCategory->Recipe->find('list');
		$categories = $this->RecipesCategory->Category->find('list');
		$this->set(compact('recipes', 'categories'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid recipes category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RecipesCategory->save($this->data)) {
				$this->Session->setFlash(__('The recipes category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipes category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RecipesCategory->read(null, $id);
		}
		$recipes = $this->RecipesCategory->Recipe->find('list');
		$categories = $this->RecipesCategory->Category->find('list');
		$this->set(compact('recipes', 'categories'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for recipes category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RecipesCategory->delete($id)) {
			$this->Session->setFlash(__('Recipes category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Recipes category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>