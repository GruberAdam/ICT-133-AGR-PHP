<?php
/*  Autor : Adam Gruber
    Date : 26.11.2019
    Version : 1.0 
    Project : Create a calender with PHP
*/
/*Links the css */
echo '<link href="Calendar%20CSS.css" rel="stylesheet" type="text/css">';

/* Take year and month choosen */
$year = @$_GET['year'];
$month = @$_GET['month'];

/* Test if query string is right */
if (empty($month)||empty($year)|| $month < 0|| $month > 12){
    /* If query string is false wrong then put current date */
    $year = date("Y");
    $month = date("n");
}

echo '<br>';

/*Create an array of the days */

$dayArray = array(
    'Monday' => 'Lun',
    'Tuesday' => 'Mar',
    'Wednesday' => 'Mer',
    'Thursday' => 'Jeu',
    'Friday' => 'Ven',
    'Saturday' => 'Sam',
    'Sunday' => 'Dim',
);

$months = array('Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre');

/*Declare 2 time variables */
$numberOfTheDay = 0;
$numberOfTheWeek = 0;
/* Get the day of the week (1-7) & day of the month (1-31) */
$numberOfTheWeek = date("N", mktime(0, 0, 0, date($month), 1, date($year) ));
/* Output is string so parse it in INT */
$numberOfTheWeekInt = (int)$numberOfTheWeek;

/* Put the base */
echo '<h1>CSS Calendar</h1>';

echo '<div class="month">';
echo '<ul>';
echo '<li class="prev">&#10094;</li>';
echo '<li class="next">&#10095;</li>';
echo '<li>';
echo $months[date($month)-1];
echo '<br>';
echo '<span style="font-size:18px">';
echo date($year);
echo '</span>';
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
    /*Checks if the first monthday needs to adapt on the weekday (1-7)*/
    if ($numberOfTheWeekInt != 1){
        for ($n = 0; $n < $numberOfTheWeekInt - 1;$n++){
            echo '<li> </li>';
        }
        $i--;
        $numberOfTheWeekInt = 1;
    }else{
        echo '<li>'.$i.'</li>';
    }

}
echo '</ul>';

