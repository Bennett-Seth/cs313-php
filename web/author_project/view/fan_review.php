<?php
    session_start();
    
    $arcReadId = $_SESSION["arcReadId"];
        echo "My Arc Reader Id Is: $arcReadId<br>"; 

    $reviewsId = $_SESSION["reviewsId"];
        echo "Current reviews id is: $reviewsId<br>";

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
                     
                    //Post First Reader Details
                    if (isset($_SESSION["arcMsg"])){
                            echo $_SESSION["arcMsg"];
                        } else {
                            echo "Session arcMgs not initializing<br>";
                        }
        
                    if (isset($_SESSION["postReview"])){
                            echo $_SESSION["postReview"];
                        } else {
                            echo "Session postReview not initializing<br>";
                        }
                                
                        echo "Would you like to amend your Review? Insert your new comments below.";
                        
                        echo "<form action='../promos/index.php' method='post'>
                        <textarea name='newFeedback' rows='20' cols='50'></textarea><br>
                        <p>What vendor is this review for?</p>
                        <input type='text' name='reviews_vendor'>
                        <input type='hidden' name='reviews_id' value='$reviewsId'>
                        <input type='hidden' name='action' value='newReview'>
                        <input type='submit' value='Submit'>
                        </form>";
                               
                ?>
                
                
            </main>
            
            <?php include '../common/footer.php'; ?>
            
		</body>	
	</html>