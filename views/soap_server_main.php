
<h1>server</h1>

<h3>
    <br>
        <?php
        if ($viewData == NULL) {
            echo "ERROR! Could not acces database!";
            return;
        }
        ?>
    <br>
</h3>

<?php
$headers = array("nev", "nem", "szuldat", "nemzet"); 

foreach ($viewData as $data_cell) {
    if (!is_array($data_cell) || count($data_cell) != 4) { 
        continue;
    }

    foreach ($headers as $header) {
        echo $data_cell[$header] . " ";
    }

    echo "<br>";
}

echo "<br>Server elkeszitve!<br>";
?>