<?php
/**
 * Created by PhpStorm.
 * User: Akame
 * Date: 22/01/2020
 * Time: 20:56
 */

ob_start()

?>

<p>Hi</p>



<?php

$content = ob_get_clean();
require "gabarit.php";
