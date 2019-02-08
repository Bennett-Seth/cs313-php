<?php
    session_start();
    
    // Get the database connection file
    require 'connect_Heroku.php';
    
    $myFan = htmlspecialchars($_POST['fan']);

    if (isset($_SESSION['superFan']) == null){
        $_SESSION['superFan'] = $db->query("SELECT * FROM fans WHERE first_name = '$myFan';"
        
    } else {
        
    }
    
    foreach ($_SESSION['superFan']) as $row){
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
						 
                    $lockCheck = $db->query("SELECT * FROM lockout WHERE fans_id = '$fansId';");
        
                    if (isset($lockCheck) != NULL)
    
							$fanLocked = $_SESSION['superFan']['first_name'];
							
							echo "I'm sorry, $fanLocked. You have been locked out and cannout participate in any more promotions. <br>";
						
                        } else {
                            
                            
                            echo "Welcome $fanFullName!<br>";
                            echo "<h2> You are involved in the following promotions: </h2>";
                            
                            $firstRead = $db->query("SELECT * FROM first_readers WHERE fans_id = '$fansId';");
        
                            $arcRead = $db->query("SELECT * FROM arc_readers WHERE fans_id = '$fansId';");
        
                            $contestWin = $db->query("SELECT * FROM contest_winner WHERE fans_id = '$fansId';");
                            
                
                             if ($firstRead == NULL){
                                  echo "You are not participating as a first reader right now.<br>";
                                } else {
                                 
                                     foreach ($db->query("SELECT first_readers.fans_id, stories.stories_id, stories.stories_title FROM first_readers RIGHT JOIN stories ON first_readers.stories_id = stories.stories_id WHERE first_readers.fans_id = '$fansId';") as $row){

                                        $storyTitle = $row['stories_title'];   

                                        echo "You are a first reader for $storyTitle <br>."; 
                                        }

                                    echo "We look forward to hearing your future comments!"
                                  
                                }
                            
                            if ($arcRead == NULL){
                                  echo "You are not participating as a ARC reader right now.<br>";
                                } else {
                                 
                                 foreach ($db->query("SELECT arc_readers.fans_id, stories.stories_id, stories.stories_title FROM arc_readers RIGHT JOIN stories ON arc_readers.stories_id = stories.stories_id WHERE arc_readers.fans_id = '$fansId';") as $row){
                                     
                                    $arcTitle =  $row['stories_title'];   
                                        
                                    echo "You are a ARC reader for $arcTitle <br>";  
                                      
                                 }
                                  
                                echo "Please have your reviews ready to post by the time $arcTitle goes live!"
						      }  
                            
                            if ($contestWin == NULL){
                                  echo "You have not won any contests yet. Keep trying!<br>";
                                
                                } else {
                                 
                                 foreach ($db->query("SELECT contest_winner.fans_id, stories.stories_id, stories.stories_title FROM contest_winner RIGHT JOIN stories ON contest_winner.stories_id = stories.stories_id WHERE contest_winner.fans_id = '$fansId';") as $row){
                                 
                                    $contestReward =  $row['stories_title']; 
                                     
                                    echo "You have won an exclusive copy of $contestReward. Congratulations!<br>"; 
                                     
                                 }
                                     
                                echo "Please stay tuned for additional contests and giveaways!" 
                                
						      } 
                    }
                ?>
                
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>