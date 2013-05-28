<?php
class ItemsController extends AppController {

	var $name = 'Items';
	


	var $components = array('Upcdbapi','Upcapi','RequestHandler');
	
	var $helpers = array('Ajax');

	function index() {
		$this->Item->recursive = 0;
		$this->set('items', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('item', $this->Item->read(null, $id));
	}

	
	function appadd(){
		
		$this->autoRender = false; 
		$this->layout = 'ajax';
		
		if (isset($_POST['code'])) {
			
			$upcdata = $this->Upcdbapi->itemlookup($_POST['code']);
			$upcdata2 = $this->Upcapi->search($_POST['code']);
			
		    $this->data['Item']['upc'] = $_POST['code'];			
			if($upcdata->itemname!=''){
				$this->data['Item']['name'] = $upcdata->itemname;
			}elseif($upcdata2['description']!=''){
				$this->data['Item']['name'] = $upcdata2['description'];
			}else{
				$this->data['Item']['name'] = $upcdata->description;
			}
			$this->data['Item']['descr'] = $upcdata2['description'];//->description;
			$this->data['Item']['price'] = $upcdata->price;
			$this->data['Item']['measurement'] = $upcdata2['size'];
		
			$this->Item->create();
			if ($this->Item->save($this->data)) {
				$itemid = $this->Item->getLastInsertId();
				$this->data = array('UsersItem'=>array('user_id'=>1,'item_id'=>$itemid));
				$this->Item->UsersItem->create();
				$this->Item->UsersItem->save($this->data);
				$response = array(
					'logged' => true,
					'message'=>'Item added!'
				);
				
			} else {
				$response = array(
					'logged' => false,
					'message' => 'Item not added!'
				);
				
			}
			echo json_encode($response);
		
		}
		
		//echo json_encode(array('message'=>$_POST['code']));
		
	}

	function newadd($id) {
		
		if (!empty($id)) {
			
			$upcdata = $this->Upcdbapi->itemlookup($id);
		    $this->data['Item']['upc'] = $id;			
			$this->data['Item']['name'] = $upcdata->itemname;
			$this->data['Item']['descr'] = $upcdata->description;
			$this->data['Item']['price'] = $upcdata->price;
		//debug($upcdata);
				$this->Item->create();
			if ($this->Item->save($this->data)) {
				$this->Session->setFlash(__('The item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.', true));
			}
			
		}
		if(!empty($this->data['Item']['upc'] ) && empty($this->data['Item']['name'])){
			
			$upcdata = $this->Upcdbapi->itemlookup($this->data['Item']['upc']);
			$data['name'] = $upcdata->itemname;
			$data['descr'] = $upcdata->description;
			$data['price'] = $upcdata->price;
			
		}else{$data = $this->data;}
		$recipes = $this->Item->Recipe->find('list');
		$user = $this->Auth->User('id');
		$this->set(compact('recipes', 'user', 'data'));
	}
	
	function add() {
		if (!empty($this->data)) {
			$this->Item->create();
			if ($this->Item->save($this->data)) {
				$this->Session->setFlash(__('The item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.', true));
			}
		}
		$yingredients = $this->Item->Yingredient->find('list', array('fields'=>array('searchvalue')));
		$recipes = $this->Item->Recipe->find('list');
		$users = $this->Item->User->find('list');
		$this->set(compact('yingredients', 'recipes', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Item->save($this->data)) {
				$this->Session->setFlash(__('The item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Item->read(null, $id);
		}
		$yingredients = $this->Item->Yingredient->find('list', array('order'=>array('searchvalue'), 'fields'=>array('searchvalue')));
		$recipes = $this->Item->Recipe->find('list');
		$users = $this->Item->User->find('list');
		$this->set(compact('yingredients', 'recipes', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for item', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Item->delete($id)) {
			$this->Session->setFlash(__('Item deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Item->recursive = 0;
		$this->set('items', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('item', $this->Item->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Item->create();
			if ($this->Item->save($this->data)) {
				$this->Session->setFlash(__('The item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.', true));
			}
		}
		$yingredients = $this->Item->Yingredient->find('list', array('fields'=>array('searchvalue')));
		$recipes = $this->Item->Recipe->find('list');
		$users = $this->Item->User->find('list');
		$this->set(compact('yingredients', 'recipes', 'users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Item->save($this->data)) {
				$this->Session->setFlash(__('The item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Item->read(null, $id);
		}
		$yingredients = $this->Item->Yingredient->find('list', array('fields'=>array('searchvalue')));
		$recipes = $this->Item->Recipe->find('list');
		$users = $this->Item->User->find('list');
		$this->set(compact('yingredients', 'recipes', 'users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for item', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Item->delete($id)) {
			$this->Session->setFlash(__('Item deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>