<?php
    session_start();
    // Get the database connection file
    require 'connect.php';   
   
    // Get php functions file
    require 'functions.php';
    
    $action = filter_input(INPUT_POST, 'action');
        if ($action == NULL){
         $action = filter_input(INPUT_GET, 'action');
         if ($action == NULL) {
             $action = 'home';
            }
        }

    //check to see if the user is already logged in
    if (isset($_SESSION['loggedin'])){
            $cookieUsername = filter_input(INPUT_COOKIE, 'username', FILTER_SANITIZE_STRING);
        } else {
            setcookie('username', '', time() - 3600, '/'); // empty value and old timestamp
        }

switch ($action){
    case 'home':
        include 'sign_up.php';    
    
    break;
        
    case 'sign_up':
        // Filter and store the data
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

      
        // Double check the validation of the email input
        $username = valUsername($username);
            
        // Double check the validation of the password input
        $checkPassword = checkPassword($password);
        
        // Check for missing data
            if(empty($username) || empty($checkPassword)){
                $message = "<p>Please provide information for all empty form fields.</p>";
                include 'sign_up.php';
            exit; }
       
        // Hash the checked password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        echo "$hashedPassword";
 /*            
        // Send the data to the model
        $signUpOutcome = signUpUser($username, $hashedPassword);
        
        // Check and report the result
        if($signUpOutcome === 1){
            // Check and report the result
            setcookie('username', $cookieUsername, strtotime('+1 year'), '/');
            $message = "<p>Thanks for registering, $username. Please use your username and password to sign in.</p>";
            include 'sign_in.php';
                exit;
            } else {
                $message = "<p>Sorry, $username, but the registration failed. Please try again.</p>";
                include 'sign_up.php';
                exit;
            }
*/    
    break;
/*
    case 'sign_in':
        
        // Filter and store the data
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        
        // Double check the validation of the email input
        $username = valUsername($username);
            
        // Double check the validation of the password input
        $checkPassword = checkPassword($password);
        
        // Check for missing data
            if(empty($username) || empty($checkPassword)){
                $message = "<p>Please provide information for all empty form fields.</p>";
                include 'sign_up.php';
            exit; }
        
        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getUser($username);
        
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($password, $clientData['clientPassword']);
        
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
            }
        
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
            
        // Break down current user's information into useable variables
        $username = $_SESSION['clientData']['username'];
        $clientPassword = $_SESSION['clientData']['clientPassword'];
            
        // Set Client's Login Cookie
        setcookie('username', $username, strtotime('+1 year'), '/');

        include 'welcome.php';
        exit;
        
    break;
*/    
    default:
         
        include 'sign_up.php';        

        
}
