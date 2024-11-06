<?php

session_start();
if(! isset($_SESSION['userid'])) $_SESSION['userid'] = 0;
if(! isset($_SESSION['userfirstname'])) $_SESSION['userfirstname'] = "";
if(! isset($_SESSION['userlastname'])) $_SESSION['userlastname'] = "";
if(! isset($_SESSION['userlevel'])) $_SESSION['userlevel'] = "1__";

include(SERVER_ROOT . 'includes/database.inc.php');
include(SERVER_ROOT . 'includes/menu.inc.php');

$page = "nyitolap";
$subpage = "";
$vars = array();

$request = $_SERVER['QUERY_STRING'];

if($request != "")
{
	$params = explode('/', $request);
	$page = array_shift($params); // the name of the requested page

	// the page is a subpage in the menu and still data in the url 
	if(array_key_exists($page, Menu::$menu) && count($params)>0)
	{
		$subpage = array_shift($params);
		if (! (array_key_exists($subpage, Menu::$menu) && Menu::$menu[$subpage][1] == $page))
		{
			$vars[] = $subpage; 
			$subpage = "";
		}
	}
	$vars += $_POST;

	foreach($params as $p) // loading the parameters array
	{
		$vars[] = $p;
	}
}
 
// finding the controller for the requested view  
$controllerfile = $page.($subpage != "" ? "_".$subpage : "");
$controllerfile = str_replace("-","_","$controllerfile");
$target = SERVER_ROOT.'controllers/'.$controllerfile.'.php';
if(! file_exists($target))
{
	echo "$target";
	$controllerfile = "error404";
	$target = SERVER_ROOT.'controllers/error404.php';
}

include_once($target);
$class = ucfirst($controllerfile).'_Controller';
if(class_exists($class))
{
	$controller = new $class;
}
else
{
	die('class does not exists!');
}

// with consistent file naming it can find automatically the model to the class
spl_autoload_register(function($className) {
    $file = SERVER_ROOT.'models/'.strtolower($className).'.php';
    if(file_exists($file))
    {
		include_once($file); 
	}
    else
    { 
		die("File '$filename' containing class '$className' not found.");
	}
});

$controller->main($vars);

?>