<?php

use \Fatec\Page; 

$app->get('/', function() {
    
	$page = new Page();

	$page->setTpl("index");

});

?>