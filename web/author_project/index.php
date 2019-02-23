<?php
    // This is my main controller file

    session_start();
    //De-Bugging? "heroku logs"

    // Get the database connection file
    require 'library/connect.php';
   
    // Get php functions file
    require 'library/functions.php';    

    $path = parse_url('https://floating-inlet-17130.herokuapp.com/author_project/index.php', PHP_URL_PATH);
    
    echo "$path<br>";

    //To get the dir, use: dirname($path)

    echo $_SERVER['DOCUMENT_ROOT'] . $path;

    $action = filter_input(INPUT_POST, 'action');
        if ($action == NULL){
         $action = filter_input(INPUT_GET, 'action');
         if ($action == NULL) {
             $action = 'home';
            }
        }

    //check to see if the user is already logged in
    if (isset($_SESSION['loggedin'])){
            $cookieUsername = filter_input(INPUT_COOKIE, 'fanEmail', FILTER_SANITIZE_STRING);
        } else {
            setcookie('fanEmail', '', time() - 3600, '/'); 
            // empty value and old timestamp
        }

switch ($action){
    case 'home':
        include 'view/fan_reg.php';    
        break;
    
    default:
        include 'view/fan_reg.php';     
        break;          
    }

?>