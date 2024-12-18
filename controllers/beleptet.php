<?php

class Beleptet_Controller
{
	public $baseName = 'beleptet';
	public function main(array $vars)
	{
		$beleptetModel = new Beleptet_Model;
		// logs in the user
		$retData = $beleptetModel->get_data($vars);
		if($retData['eredmeny'] == "ERROR")
			$this->baseName = "belepes";
		
		$view = new View_Loader($this->baseName.'_main');
		
		// passing the data to the view
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>