<?php
/*  Autor : Adam Gruber
    Date : Insert date
    Version : 1.0 
    Project : Insert Project Name
*/

echo '<link href="Table%20css.css" type="text/css" rel="stylesheet">';
//Creates a table
echo '<table>';
echo '<tr>';
$nbDaysPerMonth = date("t");
echo date("F");
for ($i = 1; $i <= $nbDaysPerMonth; $i++){
    if ($i%2 == 0){
        echo "<td class='blue'> $i </td>";
    }
    else{
        echo "<td class='white'> $i </td>";
    }
    if ($i%7 == 0){
        echo '</tr>'; //Pas sur que ce soit 100% juste
    }
}
echo '</tr>';
echo '<table>';
?>
