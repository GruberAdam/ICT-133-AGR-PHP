<?php
/*  Autor : Adam Gruber
    Date : 25.11.2019
    Version : 1.0 
    Project : Tableau avec boucle while
*/

$i = 1;
echo '<link href="Table%20css.css" type="text/css" rel="stylesheet">';
//Creates a table
echo '<table>';
echo '<tr>';
$nbDaysPerMonth = date("t");
echo date("F");
while ($i <= $nbDaysPerMonth){
    if ($i%2 == 0){
        echo "<td class='blue'> $i </td>";
    }
    else{
        echo "<td class='white'> $i </td>";
    }
    if ($i%7 == 0){
        echo '</tr>'; //Pas sur que ce soit 100% juste
    }
    $i++;
}
echo '</tr>';
echo '<table>';
?>