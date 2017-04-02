<?php
/**
 * Created by PhpStorm.
 * User: sokolskih
 * Date: 24.03.2017
 * Time: 17:56
 */

$xml = simplexml_load_file('data.xml');
echo '<br>';


$myattributes='';
foreach($xml->attributes() as $a => $b) {
    echo $a,'="',$b,"\"\n";
    if($a == 'PurchaseOrderNumber') {
        $myattributes['PurchaseOrderNumber']=$b;
    } elseif ($a == 'OrderDate') {
        $myattributes['OrderDate']=$b;
    }
}
echo '<br>';
echo '<h1>PurchaseOrderNumber: '. $myattributes['PurchaseOrderNumber'].'</h1><br>
<h2>OrderDate: '. $myattributes['OrderDate'].'</h2>';

echo '<br>';
foreach ($xml->Address as $key) {
    echo '<h3>Adress</h3>';
    echo '<p>Type: '.$key->attributes().'</p>';
    echo '<p>Name: '.$key->Name.'</p>';
    echo '<p>Street: '.$key->Street.'</p>';
    echo '<p>City: '.$key->City.'</p>';
    echo '<p>State: '.$key->State.'</p>';
    echo '<p>Zip: '.$key->Zip.'</p>';
    echo '<p>Country: '.$key->Country.'</p>';
}

echo '<h2>'.$xml->DeliveryNotes.'</h2>';

foreach ($xml->Items->Item as $key) {
    echo '<h3>Parts</h3>';
    echo '<p>PartNumber: '.$key->attributes().'</p>';
    echo '<p>ProductName: '.$key->ProductName.'</p>';
    echo '<p>Quantity: '.$key->Quantity.'</p>';
    echo '<p>USPrice: '.$key->USPrice.'</p>';
    echo '<p>ShipDate: '.$key->ShipDate.'</p>';
}

?>





