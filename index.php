<?php

define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/web2/');

//URL for the app root
define('SITE_ROOT', 'http://localhost/web2/');

// load the controller router.php
require_once(SERVER_ROOT . 'controllers/' . 'router.php');

?>