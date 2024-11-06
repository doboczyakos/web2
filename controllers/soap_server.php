<?php

class Soap_server_Controller
{
	public $baseName = 'soap_server'; 
	public function main(array $vars)
	{
		$view = new View_Loader($this->baseName."_main");
	}
}

?>