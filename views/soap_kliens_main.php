<h1>kliens</h1>

<?php

$url = "http://localhost/soap/server.php";

$options = array(
    "location" => $url,
    "uri"      => $url,
    //'keep_alive' => false,
    // 'trace' => true,
    //'connection_timeout' => 5000
);

try {
    $kliens = new SoapClient(null, $options);

    if (!$kliens) {
        echo "SOAP error!<br>";
        return;
    }
} catch (SoapFault $fault) {
    echo "SOAP error!<br>";
    return;
}

$headers = array("nev", "nem", "szuldat", "nemzet");
?>


<table>
    <tr>
    <?php foreach ($headers as $header): ?>
        <th><?php echo $header; ?></th>
    <?php endforeach; ?>
    </tr>

    <?php foreach ($kliens->adatok() as $data_cell): ?>
        <tr>
        <?php foreach ($headers as $header): ?>
            <td><?php echo $data_cell[$header]; ?></td>
        <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>

