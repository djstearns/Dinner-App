<?php 
class UpcsearchapiComponent extends Object {

   var $_apikey = '6030938C-47AB-44C1-BE13-FAED66594E57 ';
   var $_url = 'http://www.upcdatabase.org/api/json/';
  	


	
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