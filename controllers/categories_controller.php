<?php
class CategoriesController extends AppController {

	var $name = 'Categories';
	
	

	function index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('category', $this->Category->read(null, $id));
	}
	
	

	function add() {
		/*
		//$url = 'http://api.yummly.com/v1/api/metadata/cuisine?_app_id=9efa3ac3&_app_key=4828add23f422f7e778337739bb6a9a9';
		//$url = 'http://api.yummly.com/v1/api/metadata/course?_app_id=9efa3ac3&_app_key=4828add23f422f7e778337739bb6a9a9';
    	$url = 'http://api.yummly.com/v1/api/metadata/allergy?_app_id=9efa3ac3&_app_key=4828add23f422f7e778337739bb6a9a9';
		$jsonp = file_get_contents($url);
		//debug($jsonp);
		//remove front
		$firstcomma  = strpos($jsonp,',',0);
		$newstring = substr($jsonp, (-1* (strlen($jsonp) - $firstcomma-1)));
		$json = substr($newstring, 0, -2);
		$cats = json_decode($json);
		
		//$this->data = array('Category'=>array());
		//$cats = array('sweet','meaty','sour','bitter','sweet','piquant');
		$i = 0;
		foreach($cats as $cat){
			$catarr[$i] = array('ctype_id'=>4,'long_description'=>$cat->longDescription,'search_value'=>$cat->searchValue,'short_description'=>$cat->shortDescription);
			$i++;
		}
                */
	  //Decode the JSON into a php object
		//$this->data['Category']=$catarr;
		
		
		//debug($catarr);
		//debug($cats);
		if (!empty($this->data)) {
			$this->Category->create();
			if ($this->Category->saveAll($this->data['Category'])) {
				$this->Session->setFlash(__('The category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
			}
		}
		$ctypes = $this->Category->Ctype->find('list');
		$recipes = $this->Category->Recipe->find('list');
		$users = $this->Category->User->find('list');
		$this->set(compact('ctypes', 'recipes', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('The category has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Category->read(null, $id);
		}
		$ctypes = $this->Category->Ctype->find('list');
		$recipes = $this->Category->Recipe->find('list');
		$users = $this->Category->User->find('list');
		$this->set(compact('ctypes', 'recipes', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for category', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Category->delete($id)) {
			$this->Session->setFlash(__('Category deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Category was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>