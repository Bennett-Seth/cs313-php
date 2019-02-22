<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';
    
    $arcReadId = $_POST['arcReadId'];
        echo "My Arc Reader Id Is: $arcReadId";                          

?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Reviews Page</title>
            
            <?php include '../common/head.php'; ?> 
            
		</head>
		<body> 
            
            <?php include '../common/header.php'; ?>
            
            <?php include '../common/nav.php'; ?>
            
            
            <main>
                
                <?php 
                    
                    foreach ($db->query("SELECT arc_readers.arc_readers_id, arc_readers.fans_id, stories.stories_id, stories.stories_title FROM arc_readers RIGHT JOIN stories ON arc_readers.stories_id = stories.stories_id WHERE arc_readers.arc_readers_id = '$arcReadId';") as $row){
                                     
                        $thisArcReadId = $row['arc_readers_id'];
                        $thisFanId = $row['fans_id'];
                        $storyId = $row['stories_id'];
                        $arcTitle =  $row['stories_title'];   
                                        
                        echo "<p>You are a ARC reader for:<b> $arcTitle</b></p>";
                    }
                
                    foreach ($db->query("SELECT reviews_id, reviews_vendor, reviews_details FROM reviews WHERE arc_readers_id = '$arcReadId';") as $row){
                               
                            $reviewsId = $row['reviews_id'];
                            $reviewsVendor = $row['reviews_vendor'];
                            $reviewsDetails = $row['reviews_details'];

                            echo "<p> You provided the following review: $reviewsDetails</p> 
                            <p>For the following vendor: $reviewsVendor<br></p>";
                                
                            echo "Would you like to amend your review? Insert your new review below:";
                        
                            echo "<form action='fan_newReview.php' method='post'>
                            <textarea name='reviews_details' rows='20' cols='50'></textarea><br>
                            <input type='text' name='reviews_vendor' value='$reviewsVendor'>
                            <input type='hidden' name='reviews_id' value='$reviewsId'>
                            <input type='submit' value='Submit'>
                            </form>";
                        }
                       
                ?>
                
                
            </main>
            
            <?php include '../common/footer.php'; ?>
            
		</body>	
	</html>