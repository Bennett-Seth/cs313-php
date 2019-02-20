<?php
    session_start();
    //De-Bugging? "heroku logs"

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
            setcookie('username', '', time() - 3600, '/'); 
            // empty value and old timestamp
        }

switch ($action){
    case 'home':
        include 'sign_up.php';    
    
    break;
        
    case 'sign_up':
        // Filter and store the data
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $password_repeat = filter_input(INPUT_POST, 'password_repeat', FILTER_SANITIZE_STRING);

        // Double check the validation of the email input
        $username = valUsername($username);
        
        $matchPasswords = matchPasswords($password, $password_repeat);

        if ($matchPasswords === false){
            $message = "<p style='color:red;'>Please try again. Make sure your passwords match.</p>";
            echo "<h2> Sign-Up Below for experimental gama radiation treatments. </h2>
                <h2> Become an Avenger (or a pile of ooze) today! </h2>
                $message<br>
            <form action='index.php' method='post'>
                    <p>Chose your username:</p>
                    <input type='text' name='username' pattern='[A-Za-z\s]{1,60}' required>
                    <p>Choose your password:</p>
                    <span style='color:red;'>*</span><input type='password' name='password' pattern='(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$' required><br>
                    <p>Please repeat your password below:</p>
                    <span style='color:red;'>*</span><input type='password' name='password_repeat' pattern='(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$' required><br>
                    <span>Note:Passwords must be at least 8 characters, with at least one number, one capital letter and one special character.</span><br>
                    <input type='hidden' name='action' value='sign_up'>
                    <input type='submit' value='Submit'>
                </form>";
                break;
        }
        
        // Double check the validation of the password input
        $checkPassword = checkPassword($password);
        
        // Check for missing data
            if(empty($username) || empty($checkPassword)){
                $message = "<p>Please provide information for all empty form fields.</p>";
                include 'sign_up.php';
            exit; }
       
        // Hash the checked password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
         
        // Send the data to the model
        $signUpOutcome = signUpUser($username, $hashedPassword,$db);
    
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

    break;

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
        // Query the client data based on the username
        $clientData = getUser($username,$db);
        
        // Hash the checked password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($password, $hashedPassword);
        
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include 'sign_in.php';
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
    
    default:
         
        include 'sign_up.php';        
       
    }
?>