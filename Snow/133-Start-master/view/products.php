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

foreach ($snowboards as $snowboard){
    $path = $snowboard['img'];
    echo "<img src='$path' alt='snowboardImg' class=$snowboard[category]>";
}
?>


<?php
$content = ob_get_clean();
require "gabarit.php";
