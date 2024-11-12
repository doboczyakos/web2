<?php

class Soap_server_Controller
{
	public $baseName = 'soap_server'; 
	public function main(array $vars)
	{
		$soapServerModel = new SoapServer_Model;
		$retData = $soapServerModel->get_data($vars);

		$view = new View_Loader($this->baseName."_main");

		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>
