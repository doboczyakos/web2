<?php

class Soap_kliens_Controller
{
	public $baseName = 'soap_kliens'; 
	public function main(array $vars)
	{
		$view = new View_Loader($this->baseName."_main");
	}
}

?>