<?php 
class UpcdbapiComponent extends Object {

   var $_apikey = '8228b664c95804c65e7aaf52ed7a9ca8';
   var $_url = 'http://upcdatabase.org/api/json/';
  	


	
	public function itemlookup($upc) {
		$url= $this->_url.$this->_apikey.'/'.$upc;
		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$resp = curl_exec($ch);
		
		$result = json_decode($resp);
		
		return $result;
		
		//debugger::dump($result);
	}
}
?>