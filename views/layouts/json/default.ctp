<?php

    header("Pragma: no-cache");
    header("Cache-Control: no-store, no-cache, max-age=0, must-revalidate");
	/*
    //header('Content-Type: text/x-json');
	header('Content-type: application/json');
    header("X-JSON: ".$content_for_layout);

    echo $content_for_layout;
	*/
$callback = $_REQUEST['callback']; 
if ($callback) { 
    header('Content-Type: text/javascript'); 
    echo $callback . '(' . $content_for_layout . ');'; 
} else { 
    header('Content-Type: text/x-json'); 
    echo $content_for_layout;
}

?>