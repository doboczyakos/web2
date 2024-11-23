<?php

// weben: 
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('SITE_URL','http://sbda.nhely.hu');
define('SITE_ROOT', '/');

// localban:
// define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'web2/');
// define('SITE_URL', 'http://localhost');
// define('SITE_ROOT', '/web2/');

// load the controller router.php
require_once(SERVER_ROOT . 'controllers/' . 'router.php');

?>