<?php
/*  Autor : Adam Gruber
    Date : 25/01/2020
    Version : 1.0
*/
require "controler/controler.php";


/* This will redirect on the controler based on the action */
if (isset($_GET["action"])) {
    $action = $_GET["action"];
    switch ($action) {
        case 'home':
            home();
            break;
        case 'products' :
            products();
            break;
        case 'login':
            login();
            break;
        case 'logout' :
            logout();
            break;
        case 'register':
            register();
            break;
        default :
            home();
    }
} else {
    home();
}