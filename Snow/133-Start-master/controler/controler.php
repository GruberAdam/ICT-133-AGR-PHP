<?php
/*  Autor : Adam Gruber
    Date : 16.12.2019
    Version : 1.0 
    Project : Insert Project Name
*/
/**
 * Function to redirect the user to the home page
 * (depending the action received  by the index)
 */
function home(){
    $_GET["action"] = "home";
    require "view/home.php";
}