<?php
/*  Autor : Adam Gruber
    Date : 26.11.2019
    Version : 1.0
    Project : Calculator
*/
//Initiate var's
$op1 = 3;
$op2 = 7;
$resultOperation = 0;

//Get the result of the add function
$resultOperation = add($op1,$op2);
echo 'Le calcul est '.$op1.' + '.$op2.' = '.$resultOperation.'<br>'; //echo text and var
//Get the result of the sub function
$resultOperation = sub($op1,$op2);
echo 'Le calcul est '.$op1.' - '.$op2.' = '.$resultOperation.'<br>'; //echo text and var
//Get the result of the mul function
$resultOperation = mul($op1,$op2);
echo 'Le calcul est '.$op1.' * '.$op2.' = '.$resultOperation.'<br>'; //echo text and var

return 0;
//Add both numbers and return the result
function add($op1,$op2){
    $tempAdd = $op1 + $op2;
    return $tempAdd;
}

//Substract both numbers and return the result
function sub($op1,$op2){
    $tempAdd = $op1 - $op2;
    return $tempAdd;
}

//Multiply both numbers and return the result
function mul($op1,$op2){
    $tempAdd = $op1 * $op2;
    return $tempAdd;
}


?>
