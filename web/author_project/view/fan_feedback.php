<?php
    session_start();

    $feedbackId = $_SESSION["feedbackId"];

?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Feedback Page</title>
            
            <?php include '../common/head.php'; ?> 
            
		</head>
		<body> 
            
            <?php include '../common/header.php'; ?>
            
            <?php include '../common/nav.php'; ?>
            
            
            <main>
                
                <?php 
                     
                    //Post First Reader Details
                    if (isset($_SESSION["firstReadMsg"])){
                            echo $_SESSION["firstReadMsg"];
                        } else {
                            echo "Session firstReadMgs not initializing<br>";
                        }
        
                    if (isset($_SESSION["postFeedback"])){
                            echo $_SESSION["postFeedback"];
                        } else {
                            echo "Session postFeedback not initializing<br>";
                        }
                                
                        echo "Would you like to amend your feedback? Insert your new comments below:<br>";
                        
                        echo "<form action='../promos/index.php' method='post'>
                        <textarea name='newFeedback' rows='20' cols='50'></textarea><br>
                        <input type='hidden' name='feedback_id' value='$feedbackId'>
                        <input type='hidden' name='action' value='newFeedback'>
                        <input type='submit' value='Submit'>
                        </form>";
                               
                ?>
                
                
            </main>
            
            <?php include '../common/footer.php'; ?>
            
		</body>	
</html>
		