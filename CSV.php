<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 02.04.2017
 * Time: 18:30
 */


$randarray =[];

for ($i = 0; $i <= 50; $i++) {
    $randarray[$i] = rand(1,100);
}


$file = fopen('1.csv','w+');
fputcsv($file,$randarray);
fclose($file);

$csvdata = file_get_contents('1.csv');
$newArray = str_getcsv($csvdata);

var_dump($newArray);

$sum = 0;
foreach ($newArray as $key => $value) {
    $item = (int) $value;
    if (($item % 2) == 0){
        $sum += $item;
    }
}

echo "<p>выводим сумму $sum </p>";