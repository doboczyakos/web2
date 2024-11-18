<?php

// curl -H "Content-Type: application/json" -d "{ \"nev\": \"Teszt Pilóta\", \"nem\": \"N\", \"szuldat\": \"1990-01-23\", \"nemzet\": \"magyar\" }" -X POST http://localhost/web2/rest_server

class Rest_server_Controller
{
	public function main(array $vars)
	{
        $model = new RestServer_Model(Database::getConnection());
        $id = count($vars) > 0 ? $vars[0] : null;
        $method = $_SERVER["REQUEST_METHOD"];
        switch ($method) {
            case 'GET':
                if ($id) {
                    echo json_encode($model->getById($id));
                } else {
                    echo json_encode($model->getAll());
                }
                break;

            case 'POST':
                $data = json_decode(file_get_contents("php://input"), true);
                if ($model->create($data)) {
                    echo json_encode(["message" => "Rekord létrehozva."]);
                } else {
                    echo json_encode(["message" => "Létrehozás sikertelen."]);
                    http_response_code(500);
                }
                break;

            case 'PUT':
                if ($id) {
                    $data = json_decode(file_get_contents("php://input"), true);
                    if ($model->update($id, $data)) {
                        echo json_encode(["message" => "Rekord frissítve."]);
                    } else {
                        echo json_encode(["message" => "Frissítés sikertelen."]);
                        http_response_code(500);
                    }
                }
                break;

            case 'DELETE':
                if ($id) {
                    if ($model->delete($id)) {
                        echo json_encode(["message" => "Rekord törölve."]);
                    } else {
                        echo json_encode(["message" => "Törlés sikertelen."]);
                        http_response_code(500);
                    }
                }
                break;

            default:
                http_response_code(405);
                echo json_encode(["message" => "Metódus nem támogatott."]);
        }
	}
}

?>