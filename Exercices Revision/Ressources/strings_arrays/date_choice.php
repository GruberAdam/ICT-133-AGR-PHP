<?php
/*  Autor : Adam Gruber
    Date : 09.12.2019
    Version : 1.0 
    Project : Choose a date
*/
$year = 2000;
$month = 1;
for ($i = 0; $i < 50;$i++){
    echo "<a href=Calendrier.php?year=$year&month=$month>";
    echo $year;
    echo "/";
    echo $month.'</a>'.'<br>';
    if ($month == 12){
        $month = 0;
        }
    $year++;
    $month++;
}