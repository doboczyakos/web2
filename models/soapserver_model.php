<?php

class SoapServer_Model
{
	public function get_data($vars)
	{
		$myfile = fopen("../../newfile.txt", "w") or die("Unable to open file!");
		$txt = "John Doe\n";
		fwrite($myfile, $txt);
		$txt = "Jane Doe\n";
		fwrite($myfile, $txt);
		fclose($myfile);


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
}

?>