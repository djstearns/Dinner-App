<?php 

/*
CakePHP Component for upcdatabase.org  

*/


class UpcapiComponent extends Object {

		var $_apikey = '011f36fb96610b24965cdd56cef5ba0470ecc4c1';
		var $_url = 'http://www.upcdatabase.com';
		function search($upc){
			
			
			require_once ("vendors/xmlrpc.inc"); 
			require_once ("vendors/xmlrpcs.inc");

			// Setup the URL of the XML-RPC service
			$client = new xmlrpc_client('/xmlrpc', 'www.upcdatabase.com');
			
			// Construct the entire parameter list (an array) for the call.
			// The array contains a single XML_RPC_Value object, a struct.
			// The struct is constructed from a PHP associative array, and each
			// value needs to be an XML_RPC_Value object.
		
			$params = array( new XMLRPCVal( array(
				'rpc_key' => new XMLRPCVal($this->_apikey, 'string'),
				'upc' => new XMLRPCVal($upc, 'string'),
				), 'struct'));
		
			// Construct the XML-RPC request.  Substitute your chosen method name
			$msg = new XMLRPCMSG('lookup', $params);
			
			//Set debug info to true.  Useful for testing, shows the response from the server
			// $client->setDebug(1);
			
			//More debug info, create the payload before sending.
			//Not necessary to function, but useful to test
			// $msg->createPayload();
			
			//TEST Print the response to the screen for testing
			// echo "<pre>" . print_r($msg->payload, true) . "</pre><hr />";
			
			//Actually have the client send the message to the server.  Save response.
			$resp = $client->send($msg);
			
			//If there was a problem sending the message, the resp will be false
			if (!$resp)
			{
				//print the error code from the client and exit
				echo 'Communication error: ' . $client->errstr;
				
			}
			
			//If the response doesn't have a fault code, show the response as the array it is
			if(!$resp->faultCode())
			{
				//Store the value of the response in a variable
				$val = $resp->value();
				//Decode the value, into an array.
				$data = php_xmlrpc_decode($val);
				//Optionally print the array to the screen to inspect the values
				return $data;
			}else{
				//If something went wrong, show the error
				return false;
			}  
	}
	
}
?>