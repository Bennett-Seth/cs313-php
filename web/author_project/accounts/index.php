<?php
    session_start();
    //De-Bugging? "heroku logs"

/*
    // Get the database connection file
    require 'library/connect.php';
   
    // Get php functions file
    require 'library/functions.php';

    // Get php functions file
    require 'model/accounts_model.php';

    // Get php functions file
    require 'model/promos_model.php';
*/    
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

switch ($action){
        
    case 'register':
        // Filter and store the data
        $fanFirstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $fanLastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
        $fanEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $fanPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $fanPasswordRepeat = filter_input(INPUT_POST, 'password_repeat', FILTER_SANITIZE_STRING);
        $regDate = date("m/d/Y");
        
        echo "Import:$fanFirstName<br>";
        echo "Import:$fanLastName<br>";
        echo "Import:$fanEmail<br>";
        echo "Import:$fanPassword<br>";
        echo "Import:$fanPasswordRepeat<br>";
        echo "Import:$regDate<br>";
/*        
        // Double check the validation of the email input
        $fanEmail = valEmail($fanEmail);
        
        // Make sure this email isn't already included in the Database
        $existingEmail = checkExistingEmail($fanEmail, $db);
            if ($existingEmail){
                $message = "<p> That email already exists. Do you wish to login instead?</p>";
                include '../view/login.php';
                exit;   
                }
        
        // Double check the validation of the password input
        $checkPassword = checkPassword($fanPassword);
        
        $matchPasswords = matchPasswords($fanPassword, $fanPasswordRepeat);
        if ($matchPasswords === false){
            $errorMessage = "<p style='color:red;'>Please try again. Make sure your passwords match.</p>";
            echo "<header><h1>Become an Avenger!</h1></header>
            <h2> Sign-Up Below for experimental gama radiation treatments.</h2>
            <h2> Become an Avenger (or a pile of ooze) today! </h2>
            $errorMessage
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

        
        // Check for missing data
            if(empty($fanFirstName) ||empty($fanLastName) ||empty($fanEmail) || empty($checkPassword)){
                $message = "<p>Please provide information for all empty form fields.</p>";
                include 'sign_up.php';
            exit; }
       
        // Hash the checked password
        $hashedPassword = password_hash($fanPassword, PASSWORD_DEFAULT);
         
        echo "Ready to Send:$fanFirstName<br>";
        echo "Ready to Send:$fanLastName<br>";
        echo "Ready to Send:$fanEmail<br>";
        echo "Ready to Send:$fanPassword<br>";
        echo "Ready to Send:$fanPasswordRepeat<br>";
        echo "Ready to Send:$regDate<br>";
        
        // Send the data to the model
        $regOutcome = regFan($fanFirstName, $fanLastName, $fanEmail, $hashedPassword, $regDate, $db);
    
        // Check and report the result
        if($regOutcome === 1){
            // Check and report the result
            setcookie('email', $fanEmail, strtotime('+1 year'), '/');
            $message = "<p>Thanks for registering, $fanFirstName $fanLastName. Please use your username and password to sign in.</p>";
            include 'fan_login.php';
                exit;
            } else {
                $message = "<p>Sorry, $username, but the registration failed. Please try again.</p>";
                include 'view/fan_reg.php';
                exit;
                }
*/
    break;
/*
    case 'login':
        
        // Filter and store the data
        $fanEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        
        // Double check the validation of the email input
        $fanEmail = valEmail($fanEmail);
        
        // Make sure this email isn't already included in the Database
        $existingEmail = checkExistingEmail($fanEmail, $db);
            if ($existingEmail){
                $message = "<p> That email already exists. Do you wish to login instead?</p>";
                include '../view/login.php';
                exit;   
             }
            
        // Double check the validation of the password input
        $checkPassword = checkPassword($password);
        
        // Check for missing data
            if(empty($fanEmail) || empty($checkPassword)){
                $message = "<p>Please provide information for all empty form fields.</p>";
                include 'sign_up.php';
            exit; }
        
        // A valid password exists, proceed with the login process
        // Query the client data based on the username
        $fanData = getFan($fanEmail,$db);
        
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
        $fansId = $_SESSION['clientData']['fans_id'];
        $fanFirstName = $_SESSION['clientData']['first_name'];
        $fanLastName = $_SESSION['clientData']['last_name'];
        $fanPassword = $_SESSION['clientData']['password'];
        $fanEmail = $_SESSION['clientData']['email'];
        $fanRegDate = $_SESSION['clientData']['fans_reg_date'];
            
        // Set Client's Login Cookie
        setcookie('fanEmail', $fanEmail, strtotime('+1 year'), '/');

        //Lockout Check
        $lockDetails = lockCheck($fansId, $db);
        
        if (isset($lockDetails)){
            $_SESSION['lockData'] = $lockDetails;
            
            // Break down current user's information into useable variables
            $lockId = $_SESSION['lockData']['lockout_id'];
            $fanId = $_SESSION['lockData']['fans_id'];
            $lockReason = $_SESSION['lockData']['lockout_reason'];
            $lockDate = $_SESSION['lockData']['lockout_date'];
            
            $lockMsg = "I'm sorry,$fanFirstName, but as of $lockDate, your Super Fan priviledges have been locked away.<br> This is why: $lockReason";
            }
        
        $firstReadMsg = callFirstReader($fanId, $db);
        
        $arcReadMsg = callArcReader($fanId, $db);
            
        $contestMsg = callWinner($fanId, $db);
        
        $promosList = callPromos ($db);
        
        
        include '../view/fan_welcome.php';
        exit;
        
        
        
    break;
    
    default:
         
        include '../view/fan_reg.php';    
*/       
    }

?>