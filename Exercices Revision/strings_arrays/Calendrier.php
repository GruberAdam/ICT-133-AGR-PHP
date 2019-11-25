<?php
/*  Autor : Adam Gruber
    Date : Insert date
    Version : 1.0 
    Project : Insert Project Name
*/
$dayArray = array(
    'Monday' => 'Mo',
    'Tuesday' => 'Tu',
    'Wednesday' => 'We',
    'Thursday' => 'Th',
    'Friday' => 'Fr',
    'Saturday' => 'Sa',
    'Sunday' => 'Su',
);
print_r($dayArray);
echo '<link href="Calendar%20CSS.css" rel="stylesheet" type="text/css">';
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

echo "<ul class='weekdays'>";
/*Display the week days */
foreach ($dayArray as $day){
    echo '<li>'.$day.'</li>';
}
echo '</ul>';

echo '<ul class="days">';
for ($i = 1; $i <= date("t");$i++){
    echo '<li>'.$i.'</li>';
}
echo '</ul>';