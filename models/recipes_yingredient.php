<?php
class RecipesYingredient extends AppModel {
	var $name = 'RecipesYingredient';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Yingredient' => array(
			'className' => 'Yingredient',
			'foreignKey' => 'yingredient_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Recipe' => array(
			'className' => 'Recipe',
			'foreignKey' => 'recipe_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>