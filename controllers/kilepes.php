<?php

class Kilepes_Controller
{
	public $baseName = 'kilepes';
	public function main(array $vars)
	{
		$kilepesModel = new Kilepes_Model;
		$retData = $kilepesModel->get_data(); 
		$view = new View_Loader($this->baseName.'_main');
		
		// passing the data to the view
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>