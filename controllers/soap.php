<?php

class Soap_Controller
{
	public $baseName = 'soap';
	public function main(array $vars) 
	{
		$view = new View_Loader($this->baseName."_main");
	}
}

?>