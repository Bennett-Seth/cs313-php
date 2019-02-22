<?php
    session_start();
    //De-Bugging? "heroku logs"

    // Get the database connection file
    require '../library/connect.php';

    // Get php functions file
    require '../model/promos_model.php';
    
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
    }

    //check to see if the user is already logged in
    if (isset($_SESSION['loggedin'])){
            $cookieUsername = filter_input(INPUT_COOKIE, 'email', FILTER_SANITIZE_STRING);
        } else {
            setcookie('email', '', time() - 3600, '/'); 
            // empty value and old timestamp
        }

/*
switch ($action){
        
    case '':
        
        
        
        include '';
        exit;
        
    break;
        
    case '':
        
        
    
        include '';
        exit;
        
    break;

    
    default:
         
        include '';    
       
    }
*/  

?>