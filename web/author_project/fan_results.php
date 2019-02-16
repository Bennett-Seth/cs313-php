<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';
    
    $myFan = htmlspecialchars($_POST['fanId']);

    if (isset($_SESSION['superFan']) == null){
        $_SESSION['superFan'] = $db->query("SELECT * FROM fans WHERE fans_id = '$myFan';");

    } else {
        echo "Superfan session already set.";
    }
    
    foreach (($_SESSION['superFan']) as $row){
		$fanId = $row['fans_id'];
		$fanFirstName = $row['first_name'];
		$fanLastName = $row['last_name'];
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
                     
                        echo "<h2>Welcome $fanFirstName $fanLastName!<br></h2>";
                
                        echo "<p>Do you want to view or change your contact information? Do so 
                        <form action='fan_contact.php' method='post'>
                        <input type='hidden' name='fanId' value='$fanId'>
                        <input type='submit' value='Here'>
                        </form></p>"; 
                        
                        echo "<h3>You are involved in the following promotions:<br></h3>";
         
                        foreach ($db->query("SELECT first_readers.first_readers_id, first_readers.fans_id, stories.stories_id, stories.stories_title FROM first_readers RIGHT JOIN stories ON first_readers.stories_id = stories.stories_id WHERE first_readers.fans_id = '$fanId';") as $row){

                            $thisFirstReadId = $row['first_readers_id'];
                            $thisFanId = $row['fans_id'];
                            $storyId = $row['stories_id'];
                            $storyTitle = $row['stories_title'];

                            echo "<p> You are a first reader for: <b>'$storyTitle'</b>. </p>";
                            
                            echo "<p>Do you want to view or change your feedback? Do so 
                            <form action='fan_feedback.php' method='post'>
                            <input type='hidden' name='firstReadId' value='$thisFirstReadId'>
                            <input type='submit' value='Here'>
                            </form></p>"; 

                            }
  
                            foreach ($db->query("SELECT arc_readers.arc_readers_id, arc_readers.fans_id, stories.stories_id, stories.stories_title FROM arc_readers RIGHT JOIN stories ON arc_readers.stories_id = stories.stories_id WHERE arc_readers.fans_id = '$fanId';") as $row){
                                     
                            $thisArcReadId = $row['arc_readers_id'];
                            $thisFanId = $row['fans_id'];
                            $storyId = $row['stories_id'];
                            $arcTitle =  $row['stories_title'];   
                                        
                            echo "<p>You are a ARC reader for:<b> $arcTitle</b></p>";  
                            
                            echo "<p>Do you want to change your review? Do so 
                            <form action='fan_review.php' method='post'>
                            <input type='hidden' name='arcReadId' value='$thisArcReadId'>
                            <input type='submit' value='Here'>
                            </form></p>"; 
                            
                            echo "<p>Do you want to update your mailing address? Do so <a href='fan_address.php'>Here</a> </p>"; 
                            
                            }
  
                
                        foreach ($db->query("SELECT contest_winner.fans_id, stories.stories_id, stories.stories_title FROM contest_winner RIGHT JOIN stories ON contest_winner.stories_id = stories.stories_id WHERE contest_winner.fans_id = '$fanId';") as $row){
                                 
                            $thisFanId = $row['fans_id'];
                            $storyId = $row['stories_id'];
                            $contestReward =  $row['stories_title']; 
                                     
                            echo "<p>You have won an exclusive copy of: <b> $contestReward</b>. Congratulations!</p>";
                            
                            echo "<p>Please stay tuned for additional contests and giveaways!</p><hr>"; 
                                     
                            }
                
                        echo "<h2>Here are our current promotions:<br></h2>";
                            
                        foreach ($db->query("SELECT promos_title FROM promos;") as $row){
                                 
                            $promoTitle = $row['promos_title'];
                                     
                            echo "$promoTitle<br>";
                            
                            }                                   
                ?>
                
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>