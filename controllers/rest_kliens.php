<?php

class Rest_kliens_Controller
{
	public $baseName = 'rest_kliens'; 
	public function main(array $vars)
	{
		$view = new View_Loader($this->baseName."_main");
	}
}

?>