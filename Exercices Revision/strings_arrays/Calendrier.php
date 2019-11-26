<?php
/*  Autor : Adam Gruber
    Date : 26.11.2019
    Version : 1.0 
    Project : Create a calender with PHP
*/
/*Links the css */
echo '<link href="Calendar%20CSS.css" rel="stylesheet" type="text/css">';
/*Create an array of the days */
$dayArray = array(
    'Monday' => 'Mo',
    'Tuesday' => 'Tu',
    'Wednesday' => 'We',
    'Thursday' => 'Th',
    'Friday' => 'Fr',
    'Saturday' => 'Sa',
    'Sunday' => 'Su',
);
/* Put the base */
echo '<h1>CSS Calendar</h1>';

echo '<div class="month">';
echo '<ul>';
echo '<li class="prev">&#10094;</li>';
echo '<li class="next">&#10095;</li>';
echo '<li>';
echo date("F").'<br>';
echo '<span style="font-size:18px">'.date('Y').'</span>';
echo '</li>';
echo '</ul>';
echo '</div>';

/*Display the week days */
echo "<ul class='weekdays'>";
foreach ($dayArray as $day){
    echo '<li>'.$day.'</li>';
}
echo '</ul>';
/*Display the day of the months */
echo '<ul class="days">';
for ($i = 1; $i <= date("t");$i++){
    echo '<li>'.$i.'</li>';
}
echo '</ul>';