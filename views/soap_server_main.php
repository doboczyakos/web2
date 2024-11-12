
<h1>server</h1>

<h3>
    <br>
        <?php
        if ($viewData['eredmeny'] == "ERROR") {
            echo "ERROR! Could not acces database!";
            return;
        }
        ?>
    <br>
</h3>

<?php

$headers = array("nev", "nem", "szuldat", "nemzet"); 

// echo getcwd();
$myfile = fopen("../soap/server.php", "w") or die("Unable to create server!");
$txt="<?php \n".
"    class Szolgaltatas { \n".
"        public function adatok()  { \n".
"            \$arr = array();";

foreach ($viewData['uzenet'] as $data_cell) {
    $txt.="\$arr[] = array(";
    foreach ($headers as $header) {
       $txt .= "'$header' => '$data_cell[$header]',";
    }
    $txt .= ");";
}

$txt .= " return \$arr; }}".
"\$options = array(\"uri\" => \"http://localhost/soap/server.php\");".
"\$server = new SoapServer(null, \$options);".
"\$server->setClass('Szolgaltatas');".
"\$server->handle(); ?>";

fwrite($myfile, $txt);
fclose($myfile);
echo "Server elkeszitve!";
?>