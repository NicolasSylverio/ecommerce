<?php 

require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	// $sql = new fatec\DB\sql();
	echo "OK";
});

$app->run();

 ?>