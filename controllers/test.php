<?php

class Test_Controller
{
	public $baseName = 'test';
	public function main(array $vars)
	{
		$testModel = new Test_Model;
		
		// loading the data from the model
		if(! isset($vars[0])) $vars[0] = "";
		$reqData = $testModel->get_data($vars[0]); 
		
		$view = new View_Loader($this->baseName.'_main');
		
		// passing the data to the view
		$view->assign('title', $reqData['title']);
		$view->assign('content', $reqData['content']);
	}
}

?>