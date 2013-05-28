<?php
class RecipesController extends AppController {

	var $name = 'Recipes';

	
	 function getrecipes(){
           $this->autoRender = false;
			$this->Recipe->Category->recursive = 0;
           //get all listed ingredients I don't have!
           $this->loadModel('Yingredient');
		   $this->Yingredient->recursive = 0;
		   //$categories = $this->Recipe->Category->find('all', array('fields'=>array('short_description', 'id')));
		   $yingredients = $this->Recipe->Yingredient->find('all', array('fields'=>array('searchvalue', 'id')));
           //$searchExcludeIngredients = $this->Yingredient->getNonIngredients($this->Auth->User('id'));
                            
           //Search for reicpes excluding all the items I don't have!...duh!
		   //http://api.yummly.com/v1/api/recipes?_app_id=app-id&_app_key=app-key&your _search_parameters
           $newparams = '&maxResult=200&start=400&requirePictures=true&excludedCourse[]=course^course-Cocktails&excludedCourse[]=course^course-Breads';
           //for($i=0; $i<3; $i++){
			//$newparams=$newparams.'&excludedIngredient[]='.$searchExcludeIngredients[$i];
			//}
			$url = 'http://api.yummly.com/v1/api/recipes?_app_id=9efa3ac3&_app_key=4828add23f422f7e778337739bb6a9a9'.$newparams;
			 $ch = curl_init();

			 // Set query data here with the URL
			 curl_setopt($ch, CURLOPT_URL, $url); 

			 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			 curl_setopt($ch, CURLOPT_TIMEOUT, '3');
			 $content = trim(curl_exec($ch));
			 curl_close($ch);
			 $results = json_decode($content);
			 $recipes = $results->matches;
			
			
			 //debug($categories);
			 
			 //$categorynames = Set::combine($categories, '{n}.Category.id', '{n}.Category.short_description');
			 $yingredientnames = Set::combine($yingredients, '{n}.Yingredient.id', '{n}.Yingredient.searchvalue');
			 $yingredient_recipesSave = array();
			 $i = $this->Recipe->find('count')+1;
			 foreach($recipes as $recipe){
				 //save recipe data
				 //debug($recipe->recipeName);
				 $recipeSave[] = array('id'=>$i,'name'=>$recipe->recipeName, 'user_id'=>1,'yummlyid'=>$recipe->id,'cooktime'=>$recipe->totalTimeInSeconds,'photourl'=>$recipe->smallImageUrls[0]);
			
				 //if($this->Recipe->save($recipeSave)){
				    // 
				    
					 //save ingredient data
					 $ingreds = $recipe->ingredients;
					 foreach($ingreds as $ingred){
						//debug($ingred);
						
						$ingredid =array_search($ingred,$yingredientnames);
						//debug($ingredid);
						$yingredient_recipesSave[]=array('recipe_id'=>$i,'yingredient_id'=>$ingredid);
					 }
					
					 
					 //
					// debug($repingSave);
				// }else{
				 	//debug($recipeSave);
				// }
				//TODO add categories
				$i++;
			}
			$repingSave = array('RecipesYingredient'=>$yingredient_recipesSave);
			$this->Recipe->RecipesYingredient->saveAll($repingSave['RecipesYingredient']);
			$finRecSave['Recipe'] = $recipeSave;
			$this->Recipe->saveAll($finRecSave['Recipe']);
			//debug($finRecSave);
			
			
			//debug($recipes);
			 
     }
	
	function mobileindex() {
		$this->Recipe->recursive = 1;
		$this->autoRender = false;
		//$post['android_registration_id'] = $this->request->data['reg_id'];
		//$data['hash'] = $this->Auth->password($post['password']);
		$check = $this->Recipe->find('all',
			array(
				'conditions' => array(
					'User.id' => $this->Auth->User('id'),
				)
			)
		);
		$save = array();
		if($check) {
			
			$response = $check;
				
		} else {
			$response = array(
				'logged' => false,
				'message' => 'Invalid user'
			);
		}
		echo json_encode($response);
	}

	function add() {
		//set params
		/*
		$url = 'http://api.yummly.com/v1/api/recipes?_app_id=9efa3ac3&_app_key=4828add23f422f7e778337739bb6a9a9';
		$jsonp = file_get_contents($url);
		//debug($jsonp);
		//remove front
		$firstcomma  = strpos($jsonp,',',0);
		$newstring = substr($jsonp, (-1* (strlen($jsonp) - $firstcomma-1)));
		$json = substr($newstring, 0, -2);
		$cats = json_decode($json);
		
		//$this->data = array('Category'=>array());
		
		$i = 0;
		foreach($cats as $cat){
			$catarr[$i] = array('description'=>$cat->description,'searchvalue'=>$cat->term);
			$i++;
		}
	  //Decode the JSON into a php object
		$this->data['Yingredients']=$catarr;
		
		
		
		debug($this->data);
		
		
		
		if (!empty($this->data)) {
			$this->Recipe->create();
			if ($this->Recipe->save($this->data)) {
				$this->Session->setFlash(__('The recipe has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipe could not be saved. Please, try again.', true));
			}
		}
		*/
		debug($this->data);
		$users = $this->Recipe->User->find('list');
		$mealplans = $this->Recipe->Mealplan->find('list');
		$yingredients = $this->Recipe->Yingredient->find('list');
		$categories = $this->Recipe->Category->find('list');
		$items = $this->Recipe->Item->find('list');
		$users = $this->Recipe->User->find('list');
		$this->set(compact('users', 'mealplans', 'yingredients', 'categories', 'items', 'users'));
	}
	
	function fillRecipes(){
		$this->Yummlyapi->searchrecipes();
		
		
	}

	function index() {
		$this->Recipe->recursive = 0;
		$this->set('recipes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid recipe', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('recipe', $this->Recipe->read(null, $id));
	}


	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid recipe', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Recipe->save($this->data)) {
				$this->Session->setFlash(__('The recipe has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipe could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Recipe->read(null, $id);
		}
		$users = $this->Recipe->User->find('list');
		$mealplans = $this->Recipe->Mealplan->find('list');
		$yingredients = $this->Recipe->Yingredient->find('list');
		$categories = $this->Recipe->Category->find('list');
		$items = $this->Recipe->Item->find('list');
		$users = $this->Recipe->User->find('list');
		$this->set(compact('users', 'mealplans', 'yingredients', 'categories', 'items', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for recipe', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Recipe->delete($id)) {
			$this->Session->setFlash(__('Recipe deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Recipe was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Recipe->recursive = 0;
		$this->set('recipes', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid recipe', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('recipe', $this->Recipe->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Recipe->create();
			if ($this->Recipe->save($this->data)) {
				$this->Session->setFlash(__('The recipe has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipe could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Recipe->User->find('list');
		$mealplans = $this->Recipe->Mealplan->find('list');
		$yingredients = $this->Recipe->Yingredient->find('list');
		$categories = $this->Recipe->Category->find('list');
		$items = $this->Recipe->Item->find('list');
		$users = $this->Recipe->User->find('list');
		$this->set(compact('users', 'mealplans', 'yingredients', 'categories', 'items', 'users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid recipe', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Recipe->save($this->data)) {
				$this->Session->setFlash(__('The recipe has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipe could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Recipe->read(null, $id);
		}
		$users = $this->Recipe->User->find('list');
		$mealplans = $this->Recipe->Mealplan->find('list');
		$yingredients = $this->Recipe->Yingredient->find('list');
		$categories = $this->Recipe->Category->find('list');
		$items = $this->Recipe->Item->find('list');
		$users = $this->Recipe->User->find('list');
		$this->set(compact('users', 'mealplans', 'yingredients', 'categories', 'items', 'users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for recipe', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Recipe->delete($id)) {
			$this->Session->setFlash(__('Recipe deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Recipe was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>