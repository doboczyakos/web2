<?php

class Rest_server_Controller
{
	public $baseName = 'rest_server'; 
	public function main(array $vars)
	{
		$view = new View_Loader($this->baseName."_main");
	}
}

?>