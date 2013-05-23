<?php
class HolidaydatesController extends AppController {

	var $name = 'Holidaydates';

	function index() {
		$this->Holidaydate->recursive = 0;
		$this->set('holidaydates', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid holidaydate', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('holidaydate', $this->Holidaydate->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Holidaydate->create();
			if ($this->Holidaydate->save($this->data)) {
				$this->Session->setFlash(__('The holidaydate has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The holidaydate could not be saved. Please, try again.', true));
			}
		}
		$categories = $this->Holidaydate->Category->find('list');
		$this->set(compact('categories'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid holidaydate', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Holidaydate->save($this->data)) {
				$this->Session->setFlash(__('The holidaydate has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The holidaydate could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Holidaydate->read(null, $id);
		}
		$categories = $this->Holidaydate->Category->find('list');
		$this->set(compact('categories'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for holidaydate', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Holidaydate->delete($id)) {
			$this->Session->setFlash(__('Holidaydate deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Holidaydate was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>