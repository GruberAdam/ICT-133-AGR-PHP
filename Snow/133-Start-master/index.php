<?php
/*  Author : Adam Gruber
    Date : 16.12.2019
    Version : 1.0 
    Project : Insert Project Name
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