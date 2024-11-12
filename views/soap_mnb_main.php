
<pre>
<?php

function SimpleXML2ArrayWithCDATASupport($xml)
{   
    $array = (array)$xml;

    if (count($array) === 0) {
        return (string)$xml;
    }

    foreach ($array as $key => $value) {
        if (!is_object($value) || strpos(get_class($value), 'SimpleXML') === false) {
            $array[$key] = $value;
            continue;
        }

        $array[$key] = SimpleXML2ArrayWithCDATASupport($value);
    }

    return $array;
}


// https://www.mnb.hu/arfolyam-lekerdezes
// https://www.mnb.hu/letoltes/aktualis-es-a-regebbi-arfolyamok-webszolgaltatasanak-dokumentacioja-1.pdf
$currencies = array("CHF" => 4, "DKK" => 7, "EUR" => 8, "GBP" => 9, "USD" => 31);

try {
    $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");
    // echo "<br>GetCurrentExchangeRates()<br>";
    $xml = simplexml_load_string($client->GetCurrentExchangeRates()->GetCurrentExchangeRatesResult);
    $array = SimpleXML2ArrayWithCDATASupport($xml);

/*
   $index = $currencies['EUR'];   
echo "currencies.EUR -> $index <br>";

   echo "huf44: ";
   var_dump($array2['Day']['Rate'][$index]);
  */
  
  
  //$xml2 = simplexml_load_string($client->GetExchangeRates("1949-03-07", "1983-11-11", "HUF,HUF")->GetExchangeRatesResult);
  //$array2 = SimpleXML2ArrayWithCDATASupport($xml2);
  //var_dump($array2);

  // nem mukodik!!
//  var_dump(simplexml_load_string($client->GetExchangeRates("2024-11-11", "2024-11-11", "USD,HUF")->GetExchangeRatesResult));
    //print_r((array)simplexml_load_string($client->GetExchangeRates("1949-03-07", "1949-03-08", "USD,HUF")->GetExchangeRatesResult));
    //echo $array['Day']['date']."<br>";
    // $client->GetActual('USD');
} catch (SoapFault $e) {
    var_dump($e);
}


?>
</pre>


<h2>1 HUF mas devizakban:</h2>
<table>
    <tr>
    <?php foreach ($currencies as $key => $value): ?>
        <th><?php echo $key; ?></th>
    <?php endforeach; ?>
    </tr>

    <tr>
        <?php foreach ($currencies as $key => $value): ?>
            <td><?php echo($array['Day']['Rate'][$value]); ?></td>
        <?php endforeach; ?>
    </tr>
</table>


<?php 

$currencieList = array( "EUR" => "GBP", "USD" => "EUR", "GBP" => "USD", "CHF" => "EUR");
$rates = $array['Day']['Rate'];

?>

<h2>devizak egymas kozotti valltasa:</h2>
<table>
    <tr>
    <?php foreach ($currencieList as $key => $value): ?>
        <th><?php echo "$key -> $value"; ?></th>
    <?php endforeach; ?>
    </tr>

    <tr>
        <?php foreach ($currencieList as $key => $value): ?>
            <td><?php 
                    $first = $currencies[$key];
                    $second = $currencies[$value];
                   // echo "$rates[$first] / $rates[$second]";
                    $val = ((float)$rates[$first] / (float)$rates[$second]);
                    echo($val); ?>
            </td>
        <?php endforeach; ?>
    </tr>
</table>