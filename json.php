<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 26.03.2017
 * Time: 13:36
 */


/*
$cars['bmw']['x5'] = '200';
$cars['bmw']['x6'] = '300';
$cars['lada']['granta'] = '130';
$cars['niva'] = '100';
$cars['subary'] = '160';
$cars = json_encode($cars);
*/

$json1 = file_get_contents('output.json');

$flag = rand(0,1);
/*
if (flag){
    $jsonNew = str_replace('x6','x7',$json1);
}

file_put_contents('output2.json',$jsonNew);*/

$json1 = file_get_contents('output.json');
$json2 = file_get_contents('output2.json');

$json1 = json_decode($json1, true);
$json2 = json_decode($json2, true);

$diff = array_diff_assoc_recursive($json1, $json2);

var_dump($diff);


function array_diff_assoc_recursive($array1, $array2)
{
    foreach($array1 as $key => $value)
    {
        if(is_array($value))
        {
            if(!isset($array2[$key]))
            {
                $difference[$key] = $value;
            }
            elseif(!is_array($array2[$key]))
            {
                $difference[$key] = $value;
            }
            else
            {
                $new_diff = array_diff_assoc_recursive($value, $array2[$key]);
                if($new_diff != FALSE)
                {
                    $difference[$key] = $new_diff;
                }
            }
        }
        elseif(!isset($array2[$key]) || $array2[$key] != $value)
        {
            $difference[$key] = $value;
        }
    }
    return !isset($difference) ? 0 : $difference;
}

