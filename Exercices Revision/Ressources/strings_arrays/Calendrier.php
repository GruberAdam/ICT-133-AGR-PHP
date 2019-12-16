<?php
/*  Autor : Adam Gruber
    Date : 26.11.2019
    Version : 1.0 
    Project : Create a calender with PHP
*/
/*Links the css */
$monthArray = array(1 => 'Janvier',2 => 'Février', 3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin', 7 =>'Juillet', 8 => 'Août', 9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre');
echo '<link href="Calendar%20CSS.css" rel="stylesheet" type="text/css">';

/* Take year and month choosen */
$year = @$_GET['year'];
$month = @$_GET['month'];
//Test if the input is a number
if (!is_numeric($month)){
    $test = false;
    //Convert input in number
    foreach ($monthArray as $item){
        if ($item == $month){
            $test = true;
            $month = array_search($item,$monthArray);
        }
        if ($item == 'Décembre' && $test == false){
            $month = date("n");
            echo "La date entrée a eu une faut d'orthographe";
        }
    }
}

/* Get next / previous , year / month */
$previousYear = $year;
$nextYear = $year;
$numberOfDayOfPreviousMonth = date("t");
if ($month == 1){
    $previousMonth = 12;
    $previousYear--;
}
else{
    $previousMonth = $month - 1;
}

if ($month == 12){
    $nextMonth = 1;
    $nextYear++;
}
else{
    $nextMonth = $month + 1;
}



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
$numberOfTheWeek = date("N", strtotime("$year-$month-1"));//day of the week that is the 1 of the month

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
$numberOfDayLastMonths = 0;
for ($i = 1; $i <= date("t");$i++){
    /*Checks if the first monthday needs to adapt on the weekday (1-7)*/
    if ($numberOfTheWeekInt != 1){
        for ($n = 0; $n < $numberOfTheWeekInt - 1;$n++){
            echo "<li id=$n> </li>";
            $numberOfDayLastMonths++;
        }
        $i--;
        $numberOfTheWeekInt = 1;
    }else{
        echo '<li>'.$i.'</li>';
    }
}
$numberofDayInLastMonth = cal_days_in_month(CAL_GREGORIAN, $previousMonth, $previousYear);
?>


<script>
    for (var i = 0; i <= <?=$numberOfDayLastMonths?>; i++){
        var li = document.getElementById('' + i);
        var numberofDayInLastMonthé
        li.innerText = "previousMonth";
    }
</script>


<?php
echo '</ul>';
/*Buttons */
echo 'Previous month is : '. $previousMonth;
echo "<button><a href=Calendrier.php?month=$previousMonth&year=$previousYear>Previous Months</a></button>";
echo "<button><a href=Calendrier.php?month=$nextMonth&year=$nextYear>Next Months</a></button>";


?>

