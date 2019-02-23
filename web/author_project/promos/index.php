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

switch ($action){
        
    case 'newFeedback':
        
        $newFeedback = htmlspecialchars($_POST['newFeedback']);
        echo "New Feedback: $newFeedback<br>";
        $feedbackId = htmlspecialchars($_POST['feedback_id']);
        echo "Feedback Id: $feedbackId<br>";
        $newDate = date("m/d/Y");
        echo "Today's Date is: $newDate";
        
        $storyTitle = $_SESSION["storyTitle"];
        $firstReadId = $_SESSION["firstReadId"];
        
        displayFeedback($firstReadId, $db);
        
        updateFeedback($newFeedback, $feedbackId, $newDate);
        
        include '../view/fan_feedback.php';
        exit;
        
    break;
        
    case '':
        
        
    
        include '';
        exit;
        
    break;

/*   
    default:
         
        include '';    
*/  
        
    }
 

?>