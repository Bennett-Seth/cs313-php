<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';
    
    $myFan = htmlspecialchars($_POST['fan']);

    if (isset($_SESSION['superFan']) == null){
        $_SESSION['superFan'] = $db->query("SELECT * FROM fans WHERE first_name = '$myFan';");

    } else {
        echo "Superfan session already set.";
    }
    
    foreach (($_SESSION['superFan']) as $row){
		$fanId = $row['fans_id'];
		$fanFirstName = $row['first_name'];
		$fanLastName = $row['last_name'];
        $fanFullName = "$firstName $lastName";
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
                    
                        foreach ($db->query("SELECT * FROM lockout WHERE fans_id = '$fanId';") as $row){
                                
                            $lockId = $row['lockout_id'];
                            $lock_fan_id = $row['fans_id'];
                            $lock_reason = $row['lockout_reason'];
                            $lock_date = $row['lockout_date'];
                            
                            echo "Lock: $lockId, Fan: $lock_fan_id, Cause:$lock_reason, Date:$lock_date<br>";  
                        
                            }
                     
            
                        echo "<h2>Welcome $fanFullName!<br></h2>";
                        echo "<h2>You are involved in the following promotions:<br></h2>";
           
                        foreach ($db->query("SELECT first_readers.fans_id, stories.stories_id, stories.stories_title FROM first_readers RIGHT JOIN stories ON first_readers.stories_id = stories.stories_id WHERE first_readers.fans_id = '$fanId';") as $row){

                            $thisFanId = $row['fans_id'];
                            $storyId = $row['stories_id'];
                            $storyTitle = $row['stories_title'];   

                            echo "You are a first reader for $storyTitle. <br>"; 
                            
                            echo "We look forward to hearing your feedback!<br><hr>";
                            
                            }

    
                        foreach ($db->query("SELECT arc_readers.fans_id, stories.stories_id, stories.stories_title FROM arc_readers RIGHT JOIN stories ON arc_readers.stories_id = stories.stories_id WHERE arc_readers.fans_id = '$fanId';") as $row){
                                     
                            $thisFanId = $row['fans_id'];
                            $storyId = $row['stories_id'];
                            $arcTitle =  $row['stories_title'];   
                                        
                            echo "You are a ARC reader for $arcTitle <br>";  
                            
                            echo "Please have your reviews ready to post by the time $arcTitle goes live!<br><hr>";
                            
                            }
 
                                 
                        foreach ($db->query("SELECT contest_winner.fans_id, stories.stories_id, stories.stories_title FROM contest_winner RIGHT JOIN stories ON contest_winner.stories_id = stories.stories_id WHERE contest_winner.fans_id = '$fanId';") as $row){
                                 
                            $thisFanId = $row['fans_id'];
                            $storyId = $row['stories_id'];
                            $contestReward =  $row['stories_title']; 
                                     
                            echo "You have won an exclusive copy of $contestReward. Congratulations!<br>";
                            
                            echo "Please stay tuned for additional contests and giveaways!<br><hr>"; 
                                     
                            }
                
                        echo "Here are our current promotions:";
                            
                        foreach ($db->query("SELECT promos_title FROM promos;") as $row){
                                 
                            $promoTitle = $row['promos_title'];
                                     
                            echo "$promoTitle<br>";
                            
                            }
                            
                        echo "Here's the feedback on our current projects:";
                            
                        foreach ($db->query("SELECT feedback_details FROM feedback;") as $row){
                                 
                            $feedbackDet = $row['feedback_details'];
                                     
                            echo "$feedbackDet<br>";
                        
                            }
                            
                        echo "Here's the feedback on our current projects:";
                            
                        foreach ($db->query("SELECT reviews_details FROM reviews;") as $row){
                                 
                            $reviewsDet = $row['reviews_details'];
                                     
                            echo "$reviewsDet<br>";
      
                            }
                
                ?>
                
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>