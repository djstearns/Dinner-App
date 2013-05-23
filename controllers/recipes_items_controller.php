<?php
class RecipesItemsController extends AppController {

	var $name = 'RecipesItems';

	function index() {
		$this->RecipesItem->recursive = 0;
		$this->set('recipesItems', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid recipes item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('recipesItem', $this->RecipesItem->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->RecipesItem->create();
			if ($this->RecipesItem->save($this->data)) {
				$this->Session->setFlash(__('The recipes item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipes item could not be saved. Please, try again.', true));
			}
		}
		$recipes = $this->RecipesItem->Recipe->find('list');
		$items = $this->RecipesItem->Item->find('list');
		$this->set(compact('recipes', 'items'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid recipes item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RecipesItem->save($this->data)) {
				$this->Session->setFlash(__('The recipes item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipes item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RecipesItem->read(null, $id);
		}
		$recipes = $this->RecipesItem->Recipe->find('list');
		$items = $this->RecipesItem->Item->find('list');
		$this->set(compact('recipes', 'items'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for recipes item', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RecipesItem->delete($id)) {
			$this->Session->setFlash(__('Recipes item deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Recipes item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>