<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';

    echo "Test: $_SESSION['firstReadId']";
  
    if (isset($newFeedback = htmlspecialchars($_POST['newFeedback']))){
        
        /* TEST CODE:
        
        echo "Test: $_SESSION['firstReadId']";
        
        SELECT first_readers.first_readers_id, first_readers.fans_id, 
feedback.stories_id, feedback.feedback_details
FROM first_readers 
RIGHT JOIN feedback
ON first_readers.stories_id = feedback.stories_id 
WHERE first_readers.fans_id = '$_SESSION['firstReadId']';

*/
    
    }  

?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Fan Reference Page</title>

            <meta name="viewport" content="width=device-width, initial-scale=1">
            
		</head>
		<body> 
            
            <header>
           
                <h1> First Reader Resources </h1>    
    
            </header>
            
            <nav>
            
                <!-- A full menu for each search option could be useful here... -->
            
            </nav>
            
            <main>
                
                <?php 
                    
                    foreach ($db->query("SELECT first_readers.first_readers_id, first_readers.fans_id, stories.stories_id, stories.stories_title FROM first_readers RIGHT JOIN stories ON first_readers.stories_id = stories.stories_id WHERE first_readers.fans_id = '$fanId';") as $row){

                            $thisFirstReadId = $row['first_readers_id'];
                            $thisFanId = $row['fans_id'];
                            $storyId = $row['stories_id'];
                            $storyTitle = $row['stories_title'];   

                            echo "<p> You are a first reader for: <b>$storyTitle</b>. </p>";
                        
                            foreach ($db->query("SELECT * FROM feedback WHERE first_readers_id = '$thisFirstReadId';") as $row){
                               
                                $feedbackId = $row['feedback_id'];
                                $firstReadId = $row['first_readers_id'];
                                $storyId = $row['stories_id'];
                                $feedbackDetails = $row['feedback_details'];
                                $feedbackDate = row['feedback_date'];

                                echo "<p> You provided the following feedback for: <b>$storyTitle</b>:$feedbackDetails  </p>";
                                
                                }
                        
                            echo "Would you like to amend your feedback? Insert your new comments below:";
                        
                            echo "<form action='fan_reviews.php' method='post'><textarea name="newFeedback" rows="20" cols="50"></textarea><br>  
                            <input type='submit' value='Submit'></form>";
                        
                        }
                        
                        
                
                ?>
                
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>
		$fanLastName = $row['last_name'];
            echo "$fanLastName <br>";
        }                                       

?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Fan Reference Page</title>

            <meta name="viewport" content="width=device-width, initial-scale=1">
            
		</head>
		<body> 
            
            <header>
           
                <h1> Fan Resources </h1>    
    
            </header>
            
            <nav>
            
                <!-- A full menu for each search option could be useful here... -->
            
            </nav>
            
            <main>
                
                <?php 
                    
                      
                ?>
                
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>