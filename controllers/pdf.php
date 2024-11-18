<?php

class PDF_Controller
{
	public $baseName = 'pdf';
	public function main(array $vars) 
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			$table1 = $_POST['table1'];
			$table2 = $_POST['table2'];
			$table3 = $_POST['table3'];

			$model = new Pdf_Model(Database::getConnection());
			$model->generatePdf($table1, $table2, $table3);
		}
		else
		{
			$view = new View_Loader($this->baseName."_main");
		}
	}
}

?>