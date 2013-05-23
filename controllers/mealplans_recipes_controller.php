<?php
class MealplansRecipesController extends AppController {

	var $name = 'MealplansRecipes';

	function index() {
		$this->MealplansRecipe->recursive = 0;
		$this->set('mealplansRecipes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mealplans recipe', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mealplansRecipe', $this->MealplansRecipe->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MealplansRecipe->create();
			if ($this->MealplansRecipe->save($this->data)) {
				$this->Session->setFlash(__('The mealplans recipe has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mealplans recipe could not be saved. Please, try again.', true));
			}
		}
		$mealplans = $this->MealplansRecipe->Mealplan->find('list');
		$recipes = $this->MealplansRecipe->Recipe->find('list');
		$this->set(compact('mealplans', 'recipes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mealplans recipe', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MealplansRecipe->save($this->data)) {
				$this->Session->setFlash(__('The mealplans recipe has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mealplans recipe could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MealplansRecipe->read(null, $id);
		}
		$mealplans = $this->MealplansRecipe->Mealplan->find('list');
		$recipes = $this->MealplansRecipe->Recipe->find('list');
		$this->set(compact('mealplans', 'recipes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mealplans recipe', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MealplansRecipe->delete($id)) {
			$this->Session->setFlash(__('Mealplans recipe deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mealplans recipe was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>