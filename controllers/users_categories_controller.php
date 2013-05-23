<?php
class UsersCategoriesController extends AppController {

	var $name = 'UsersCategories';

	function index() {
		$this->UsersCategory->recursive = 0;
		$this->set('usersCategories', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid users category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('usersCategory', $this->UsersCategory->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->UsersCategory->create();
			if ($this->UsersCategory->save($this->data)) {
				$this->Session->setFlash(__('The users category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users category could not be saved. Please, try again.', true));
			}
		}
		$users = $this->UsersCategory->User->find('list');
		$categories = $this->UsersCategory->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid users category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->UsersCategory->save($this->data)) {
				$this->Session->setFlash(__('The users category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->UsersCategory->read(null, $id);
		}
		$users = $this->UsersCategory->User->find('list');
		$categories = $this->UsersCategory->Category->find('list');
		$this->set(compact('users', 'categories'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for users category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->UsersCategory->delete($id)) {
			$this->Session->setFlash(__('Users category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Users category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>