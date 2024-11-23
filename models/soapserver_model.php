<?php

class SoapServer_Model
{
    public static $dbConnection;

	public static function getConn()
	{
		return self::$dbConnection;
	}

	public static function get_data($vars)
	{
		$retData['eredmeny'] = "";

		try {
			$connection = Database::getConnection();
			$sql = "SELECT nev,nem,szuldat,nemzet FROM `pilota` WHERE 1";
			$stmt = $connection->query($sql);
			$pilots = $stmt->fetchAll(PDO::FETCH_ASSOC);

			switch(count($pilots)) {
				case 0:
					$retData['eredmeny'] = "ERROR";
					$retData['uzenet'] = "Nem sikerult a kapcsolat a tablava!";
					break;
				default:
					$retData['eredmeny'] = "OK";
					$retData['uzenet'] = array();
                    $retData['uzenet'] = $pilots;
					break;
			}
		}
		catch (PDOException $e) {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}

		return $retData;
	}
	
	public function getAdat() {
		try {
			// weben
			$con = new PDO('mysql:host=mysql.omega'.';dbname=sbda', 'sbda', 'GAMF2024', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
			
			// localban
			// $con = new PDO('mysql:host=localhost'.';dbname=web2', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
			$con->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
		
			$sql = "SELECT nev,nem,szuldat,nemzet FROM `pilota` WHERE 1";
			$stmt = $con->query($sql);
			$pilots = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
		}
		
		return $pilots;
    }
}


$options = array("uri" => "http://sbda.nhely.hu/models/soapserver_model.php");
// $options = array("uri" => "http://localhost/web2/models/soapserver_model.php");
$server = new SoapServer(null, $options);
$server->setClass('SoapServer_Model');
// $server->setObject(new SoapServer_Model);
$server->handle();

?>