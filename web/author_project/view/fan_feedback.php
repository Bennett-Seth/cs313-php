<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';
  
    $firstReadId = $_POST['firstReadId'];
        echo "This is the Reader Id: $firstReadId ";   

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
                    
                    foreach ($db->query("SELECT first_readers.first_readers_id, first_readers.fans_id, stories.stories_id, stories.stories_title FROM first_readers RIGHT JOIN stories ON first_readers.stories_id = stories.stories_id WHERE first_readers.first_readers_id = '$firstReadId';") as $row){

                            $thisFirstReadId = $row['first_readers_id'];
                                echo "Reader Id: $thisFirstReadId<br>";
                            $thisFanId = $row['fans_id'];
                                echo "Fan Id: $thisFanId<br>";
                            $storyId = $row['stories_id'];
                                echo "Story Id: $storyId<br>";
                            $storyTitle = $row['stories_title'];
                                echo "Story Title: $storyTitle<br>";

                            echo "<p> You are a first reader for: <b>$storyTitle</b>. </p>";
                            }
        
                    foreach ($db->query("SELECT * FROM feedback WHERE first_readers_id = '$firstReadId';") as $row){
                               
                            $feedbackId = $row['feedback_id'];
                            $firstReadId = $row['first_readers_id'];
                            $storyId = $row['stories_id'];
                            $feedbackDetails = $row['feedback_details'];
                            $feedbackDate = row['feedback_date'];

                            echo "<p> You provided the following feedback:<br> <b>$storyTitle</b>: $feedbackDetails  </p>";
                                
                            echo "Would you like to amend your feedback? Insert your new comments below:";
                        
                            echo "<form action='fan_newFeedback.php' method='post'>
                            <textarea name='newFeedback' rows='20' cols='50'></textarea><br>
                            <input type='hidden' name='feedback_id' value='$feedbackId'>
                            <input type='submit' value='Submit'>
                            </form>";
                        }
                               
                ?>
                
                
            </main>
            
            <?php include '../common/footer.php'; ?>
            
		</body>	
</html>
		