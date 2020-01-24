<?php
/**
 * Created by PhpStorm.
 * User: Akame
 * Date: 22/01/2020
 * Time: 20:56
 */

ob_start()
?>

<?php
require "model/model.php";

/* Calls a function to decode the file */
$snowboards = jsonDecode("model/snowboards.json");

/* This will display every snowboard */
foreach ($snowboards as $snowboard){
    $path = $snowboard['img'];
    echo "<img src='$path' alt='snowboardImg' class=$snowboard[category]>";
    echo "<div id='snowboard_container'>";
    echo "<div class='snowboard_text'>Model : $snowboard[model]</div>";
    echo "<div class='snowboard_text'>Size : $snowboard[size]</div>";
    echo "<div class='snowboard_text'>Price : $snowboard[price]</div>";
    echo "</div>";
}
?>


<?php
$content = ob_get_clean();
require "gabarit.php";
