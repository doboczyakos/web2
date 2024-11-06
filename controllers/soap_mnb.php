<?php

class Soap_mnb_Controller
{
	public $baseName = 'soap_mnb'; 
	public function main(array $vars)
	{
		$view = new View_Loader($this->baseName."_main");
	}
}

?>