<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';
    
    $reviewsId = $_POST['reviews_id'];
        echo "Review Id is: $reviewsId<br>";
    $reviewsDetails = htmlspecialchars($_POST['reviews_details']);
        echo "Review Details are: $reviewsDetails<br>";
    $reviewsVendor = htmlspecialchars($_POST['reviews_vendor']);
        echo "Review Vendor is: $reviewsVendor<br>";
    $reviewsDate = date("m/d/Y");
        echo "Today's Date is: $reviewsDate";

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
                
                <h1>Your new review is:</h1>
                
                <?php 
                                 
                    $query = 'UPDATE reviews SET reviews_vendor = :reviews_vendor, reviews_details = :reviews_details, reviews_date = :reviews_date
                    WHERE reviews_id = :reviews_id';

                    $statement = $db->prepare($query);

                    $statement->bindValue(':reviews_vendor', $reviewsVendor);
                    $statement->bindValue(':reviews_details', $reviewsDetails);
                    $statement->bindValue(':reviews_date', $reviewsDate);
                    $statement->bindValue(':reviews_id', $reviewsId);

                    $statement->execute();
                
                    echo "update successful<br>";
                
                    foreach ($db->query("SELECT reviews_details FROM reviews WHERE reviews_id = '$reviewsId';") as $row){

                        $printReview = $row['reviews_details'];
                                echo "New Review: $printReview <br>";
                    
                        }  
                               
                ?>
                
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>