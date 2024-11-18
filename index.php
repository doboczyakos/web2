<?php

define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/web2/');

define('SITE_URL', 'http://localhost');

//URL for the app root
define('SITE_ROOT', '/web2/');

// load the controller router.php
require_once(SERVER_ROOT . 'controllers/' . 'router.php');

?>