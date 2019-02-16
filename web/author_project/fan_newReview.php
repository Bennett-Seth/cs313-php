<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';
    
    $reviewsId = $_POST['reviews_id'];
    $reviewsDetails = htmlspecialchars($_POST['reviews_details']);
    $reviewsVendor = htmlspecialchars($_POST['reviews_vendor']);

    $newDate = date("m/d/Y");
        echo "Today's Date is: $newDate";

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
                    
                    Echo "We got this far.";
                               
                ?>
                
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>