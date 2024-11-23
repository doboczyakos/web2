<?php

class Soap_server_Controller
{
	public $baseName = 'soap_server'; 
	public function main(array $vars)
	{
		$soapServerModel = new SoapServer_Model();
		$retData = $soapServerModel->getAdat();

		$view = new View_Loader($this->baseName."_main");

		foreach($retData as $name => $value) {
			$view->assign($name, $value);
		}
		
		$options = array("uri" => "http://sbda.nhely.hu/models/soapserver_model.php");
		// $options = array("uri" => "http://localhost/web2/models/soapserver_model.php");
		$server = new SoapServer(null, $options);
		$server->setClass('SoapServer_Model');
		// $server->setObject($soapServerModel);
		// $server->setPersistence(SOAP_PERSISTENCE_SESSION);
		$server->handle();
	}
}

?>
