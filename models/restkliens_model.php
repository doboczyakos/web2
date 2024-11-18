<?php
class RestKliens_Model {
    private $apiUrl = SITE_URL . SITE_ROOT . "rest_server";

    private function sendRequest($method, $url, $data = null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($data))
            ]);
        }

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    public function getAll() {
        return $this->sendRequest("GET", $this->apiUrl);
    }

    public function getById($id) {
        return $this->sendRequest("GET", $this->apiUrl . "/$id");
    }

    public function create($data) {
        return $this->sendRequest("POST", $this->apiUrl, $data);
    }

    public function update($id, $data) {
        return $this->sendRequest("PUT", $this->apiUrl . "/$id", $data);
    }

    public function delete($id) {
        return $this->sendRequest("DELETE", $this->apiUrl . "/$id");
    }
}
