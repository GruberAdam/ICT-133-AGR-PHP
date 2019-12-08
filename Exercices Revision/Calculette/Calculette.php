<?php
//Initiate var's
$op1 = 3;
$op2 = 7;
$resultOperation = 0;


$resultOperation = add($op1,$op2);
echo $resultOperation . '<br>';
$resultOperation = sub($op1,$op2);
echo $resultOperation . '<br>';
$resultOperation = mul($op1,$op2);
echo $resultOperation . '<br>';

function add($op1,$op2){
    $tempAdd = $op1 + $op2;
    return $tempAdd;
}

function sub($op1,$op2){
    $tempAdd = $op1 - $op2;
    return $tempAdd;
}

function mul($op1,$op2){
    $tempAdd = $op1 * $op2;
    return $tempAdd;
}


?>
