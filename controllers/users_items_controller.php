<?php
class UsersItemsController extends AppController {

	var $name = 'UsersItems';

	function index() {
		$this->UsersItem->recursive = 0;
		$this->set('usersItems', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid users item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('usersItem', $this->UsersItem->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->UsersItem->create();
			if ($this->UsersItem->save($this->data)) {
				$this->Session->setFlash(__('The users item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users item could not be saved. Please, try again.', true));
			}
		}
		$users = $this->UsersItem->User->find('list');
		$items = $this->UsersItem->Item->find('list');
		$this->set(compact('users', 'items'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid users item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->UsersItem->save($this->data)) {
				$this->Session->setFlash(__('The users item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->UsersItem->read(null, $id);
		}
		$users = $this->UsersItem->User->find('list');
		$items = $this->UsersItem->Item->find('list');
		$this->set(compact('users', 'items'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for users item', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->UsersItem->delete($id)) {
			$this->Session->setFlash(__('Users item deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Users item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>