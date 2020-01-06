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
function login(){
    //Takes the username / password
    $user_name = @$_POST['user_name'];
    $password = @$_POST['password'];
    //Checks if the username or password is empty
    if ($user_name == "" || $password == ""){
        require "view/login.php";
    }
    else{
        require "model/model.php";
        //Checks if the password is true
        $connected = checkLogin($user_name, $password);
        if ($connected){
            require "view/home.php";
        }
        else{
            require "view/login.php";
        }
    }
}