<?php 
class YummlyapiComponent extends Object {

   var $_appid = '_app_id=9efa3ac3';
   var $_appkey = '_app_key=4828add23f422f7e778337739bb6a9a9';
   var $_url = 'http://api.yummly.com/v1/api/';
   	//http format: _app_id=app-id&_app_key=app-key

	//http://api.yummly.com/v1/api/recipes?_app_id=app-id&_app_key=app-key&your _search_parameters
	
	
	//http://api.yummly.com/v1/api/metadata/cuisine?_app_id=9efa3ac3&_app_key=4828add23f422f7e778337739bb6a9a9
	//http://api.yummly.com/v1/api/metadata/course?_app_id=9efa3ac3&_app_key=4828add23f422f7e778337739bb6a9a9
    //http://api.yummly.com/v1/api/metadata/holiday?_app_id=9efa3ac3&_app_key=4828add23f422f7e778337739bb6a9a9
	
	/*
	params = array(
		q = free form text,
		requirePictures = true/false,
		allowedIngredient[]=SEARCHTERM 								//must include this ingredient(s)
		excludedIngredient[]=SEARCHTERM  							//
		allowedDiet[]												//only recipies with this diet
		allowedAllergy[]											//only recipes with this allergy
		allowedCuisine[]
		allowedHoliday[]
		allowedCourse[]
		excludedCuisine[]
		excludedHoliday[]
		excludedCourse[]
		maxTotalTimeInSeconds=INTEGER
		nutrition.ATTR_NAME.{min|max} // &nutrition.K.min=3
		maxResult, start 											// &maxResult=10&start=10 numbering starts at 0
		flavor.{sweet|meaty|sour|bitter|sweet|piquant}.{min|max} 	// &flavor.sweet.min=0.8 and &flavor.sweet.max=1
		facetField[] 												//&facetField[]=ingredient 
	)
	
	
	RETURNS
		array(
			attribution
			totalMatchCount
			facetCounts
			matches
				attributes
				flavors
					salty,sweet,bitter,sour,meaty,piquant
				rating
				id
				smallImageUrls
				sourceDisplayName
				totalTimeInSeconds
				ingredients =array[]
				recipeName
			criteria 
		)
*/
         public function searchrecipesfrominventory($params) {
		$newparams = '';
		for($i=0; $i<20; $i++){//$params as $key => $param){
			$newparams=$newparams.'&ExcludedIngredient[]='.urlencode($params[$i]);
		}
		
		//$jsonp = file_get_contents("'".$this->_url."recipes?".$this->_appid."&".$this->_appkey.$newparams."'");
		$jsonp = file_get_contents('http://api.yummly.com/v1/api/recipes?_app_id=9efa3ac3&_app_key=4828add23f422f7e778337739bb6a9a9&ExcludedIngredient[]=salt&ExcludedIngredient[]=sugar');
                 
                 debug($jsonp);
		//remove front
		$firstcomma  = strpos($jsonp,',',0);
		$newstring = substr($jsonp, (-1* (strlen($jsonp) - $firstcomma-1)));
		$json = substr($newstring, 0, -2);
		return  json_decode($json);
		
	}

	public function searchrecipes($params) {
		
		foreach($params as $key => $param){
			$params=$params.'&'.$key.'='.urlencode($param);
		}
		
		$jsonp = file_get_contents($this->_url.'recipes/'.$params);
		//debug($jsonp);
		//remove front
		$firstcomma  = strpos($jsonp,',',0);
		$newstring = substr($jsonp, (-1* (strlen($jsonp) - $firstcomma-1)));
		$json = substr($newstring, 0, -2);
		return  json_decode($json);
		
	}
	/*
			REQUIREMENTS:
		html: If your application uses HTML to display data to the users, you must include the contents of the html field verbatim in a visible place near the data. You can ignore the other fields. You may not modify the HTML snippet.
		url, text, logo: If your application is native (desktop or mobile) or otherwise doesn't use HTML, you must display the text, the logo, and a link to the URL in a visible place near the data. Clicking this should open a browser on the url. You may not modify the URL, the link text, or the logo image.
		
		SAMPLE::
		
		{
			"attribution": {
				"html": "<a href='http://www.yummly.com/recipe/Hot-Turkey-Salad-Sandwiches-Allrecipes'>Hot Turkey Salad Sandwiches recipe</a> information powered by <img src='http://static.yummly.com/api-logo.png'/>",
				"url": "http://www.yummly.com/recipe/Hot-Turkey-Salad-Sandwiches-Allrecipes",
				"text": "Hot Turkey Salad Sandwiches recipes: information powered by Yummly",
				"logo": "http://static.yummly.com/api-logo.png"
			},
			"ingredientLines": [
				"2 cups diced cooked turkey",
				"2 celery ribs, diced",
				"1 small onion, diced",
				"2 hard-cooked eggs, chopped",
				"3/4 cup mayonnaise",
				"1/2 teaspoon salt",
				"1/4 teaspoon pepper",
				"6 hamburger buns, split"
			],
			"flavors": {
				"Salty": 0.004261637106537819,
				"Meaty": 0.0019220244139432907,
				"Piquant": 0,
				"Bitter": 0.006931612268090248,
				"Sour": 0.009972159750759602,
				"Sweet": 0.0032512755133211613
			},
			"nutritionEstimates": [
				{
					"attribute": "ENERC_KCAL",
					"description": "Energy",
					"value": 317.4,
					"unit": {
						"name": "calorie",
						"abbreviation": "kcal",
						"plural": "calories",
						"pluralAbbreviation": "kcal"
					}
				},
				{
					"attribute": "FAT",
					"description": "Total lipid (fat)",
					"value": 13.97,
					"unit": {
						"name": "gram",
						"abbreviation": "g",
						"plural": "grams",
						"pluralAbbreviation": "grams"
					}
				},
				{
					"attribute": "FASAT",
					"description": "Fatty acids, total saturated",
					"value": 2.7,
					"unit": {
						"name": "gram",
						"abbreviation": "g",
						"plural": "grams",
						"pluralAbbreviation": "grams"
					}
				},
				{
					"attribute": "CHOLE",
					"description": "Cholesterol",
					"value": 0.11,
					"unit": {
						"name": "gram",
						"abbreviation": "g",
						"plural": "grams",
						"pluralAbbreviation": "grams"
					}
				},
				{
					"attribute": "NA",
					"description": "Sodium, Na",
					"value": 0.66,
					"unit": {
						"name": "gram",
						"abbreviation": "g",
						"plural": "grams",
						"pluralAbbreviation": "grams"
					}
				},
				{
					"attribute": "K",
					"description": "Potassium, K",
					"value": 0.2,
					"unit": {
						"name": "gram",
						"abbreviation": "g",
						"plural": "grams",
						"pluralAbbreviation": "grams"
					}
				},
				{
					"attribute": "CHOCDF",
					"description": "Carbohydrate, by difference",
					"value": 29.92,
					"unit": {
						"name": "gram",
						"abbreviation": "g",
						"plural": "grams",
						"pluralAbbreviation": "grams"
					}
				},
				{
					"attribute": "FIBTG",
					"description": "Fiber, total dietary",
					"value": 1.3,
					"unit": {
						"name": "gram",
						"abbreviation": "g",
						"plural": "grams",
						"pluralAbbreviation": "grams"
					}
				},
				{
					"attribute": "SUGAR",
					"description": "Sugars, total",
					"value": 5.25,
					"unit": {
						"name": "gram",
						"abbreviation": "g",
						"plural": "grams",
						"pluralAbbreviation": "grams"
					}
				},
				{
					"attribute": "PROCNT",
					"description": "Protein",
					"value": 17.6,
					"unit": {
						"name": "gram",
						"abbreviation": "g",
						"plural": "grams",
						"pluralAbbreviation": "grams"
					}
				},
				{
					"attribute": "VITA_IU",
					"description": "Vitamin A, IU",
					"value": 159.13,
					"unit": {
						"name": "IU",
						"abbreviation": "IU",
						"plural": "IU",
						"pluralAbbreviation": "IU"
					}
				},
				{
					"attribute": "VITC",
					"description": "Vitamin C, total ascorbic acid",
					"value": 0,
					"unit": {
						"name": "gram",
						"abbreviation": "g",
						"plural": "grams",
						"pluralAbbreviation": "grams"
					}
				},
				{
					"attribute": "CA",
					"description": "Calcium, Ca",
					"value": 0.08,
					"unit": {
						"name": "gram",
						"abbreviation": "g",
						"plural": "grams",
						"pluralAbbreviation": "grams"
					}
				},
				{
					"attribute": "FE",
					"description": "Iron, Fe",
					"value": 0,
					"unit": {
						"name": "gram",
						"abbreviation": "g",
						"plural": "grams",
						"pluralAbbreviation": "grams"
					}
				}
			],
			"images": [
				{
					"hostedLargeUrl": "http://i2.yummly.com/Hot-Turkey-Salad-Sandwiches-Allrecipes.l.png",
					"hostedSmallUrl": "http://i2.yummly.com/Hot-Turkey-Salad-Sandwiches-Allrecipes.s.png"
				}
			],
			"name": "Hot Turkey Salad Sandwiches",
			"yield": "6 servings",
			"totalTime": "30 Min",
			"attributes": {
				"holiday": [
					"Christmas",
					"Thanksgiving"
				],
				"cuisine": [
					"Italian",
					"Canadian",
					"Soul food",
					"American"
				]
			},
			"totalTimeInSeconds": 1800,
			"rating": 4.44,
			"numberOfServings": 6,
			"source": {
				"sourceRecipeUrl": "http://allrecipes.com/Recipe/hot-turkey-salad-sandwiches/detail.aspx",
				"sourceSiteUrl": "http://www.allrecipes.com",
				"sourceDisplayName": "AllRecipes"
			},
			"id": "Hot-Turkey-Salad-Sandwiches-Allrecipes"
		}

	*/
	
	public function getrecipe($url, $params) {
		
		$jsonp = file_get_contents($url.'recipes/'.$params);
		//debug($jsonp);
		//remove front
		$firstcomma  = strpos($jsonp,',',0);
		$newstring = substr($jsonp, (-1* (strlen($jsonp) - $firstcomma-1)));
		$json = substr($newstring, 0, -2);
		return  json_decode($json);
		
	}
}
?>