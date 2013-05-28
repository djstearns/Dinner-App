<?php
class Yingredient extends AppModel {
	var $name = 'Yingredient';

	var $hasAndBelongsToMany = array(
		'Recipe' => array(
			'className' => 'Recipe',
			'joinTable' => 'recipes_yingredients',
			'foreignKey' => 'yingredient_id',
			'associationForeignKey' => 'recipe_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

    public function getNonIngredients($userid){
      $rows = $this->query('SELECT yingredients.searchvalue FROM yingredients WHERE yingredients.id NOT IN(SELECT DISTINCT items.yingredient_id FROM users_items INNER JOIN items ON users_items.item_id = items.id WHERE (((users_items.user_id)='.$userid.')))');
      //$rows = $this->find('list', array('conditions'=>array('NOT'=>array('yingredient.id'=>$list))));
      foreach($rows as $row){
         $list[] = $row['yingredients']['searchvalue'];
      }
      return $list;

    }
}
?>