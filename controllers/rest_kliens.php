<?php

class Rest_kliens_Controller
{
	public $baseName = 'rest_kliens'; 
	public function main(array $vars)
	{
		$model = new RestKliens_Model();

		if (count($vars) == 0)
		{
			$pilotak = $model->getAll();
			$view = new View_Loader($this->baseName."_main");
			$view->assign("pilotak", $pilotak);
		}
		else
		{
			switch ($vars[0])
			{
				case "edit":
					if ($_SERVER['REQUEST_METHOD'] === 'POST')
					{
						$data = $_POST;
						if (isset($data['az']) && $data['az']) {
							$model->update($data['az'], $data);
						} else {
							$model->create($data);
						}
						header("Location: " . SITE_ROOT . "rest_kliens");
					}
					else
					{
						$pilota = count($vars) > 1 ? $model->getById($vars[1]) : null;
						$view = new View_Loader($this->baseName."_edit");
						$view->assign("pilota", $pilota);
					}
					break;
			}
		}
	}
}

?>