<?php

class Soap_kliens_Controller
{
	public $baseName = 'soap_kliens';
	public function main(array $vars)
	{
		$view = new View_Loader($this->baseName."_main");

		$url = "http://sbda.nhely.hu/models/soapserver_model.php";
		// $url = "http://localhost/web2/models/soapserver_model.php";
		$options = array(
			"location" =>  $url,
			"uri"      => $url,
		);

		try {
			$kliens = new SoapClient(null, $options);

			if (!$kliens) {
				echo "SOAP client error!<br>";
				return;
			}
		} catch (SoapFault $fault) {
			echo "SOAP error!<br> $fault";
			return;
		}

		foreach($kliens->getAdat() as $name => $value)
			$view->assign($name, $value);
	}
}

?>