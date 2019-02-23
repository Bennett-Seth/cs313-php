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
			<title>Reviews Page</title>
            
            <?php include 'https://floating-inlet-17130.herokuapp.com/author_project/common/head.php.php'; ?> 
            
		</head>
		<body>
            <?php include 'https://floating-inlet-17130.herokuapp.com/author_project/common/header.php'; ?>
            
            <?php include 'https://floating-inlet-17130.herokuapp.com/author_project/common/nav.php'; ?>
            
            
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
            
           <?php include 'https://floating-inlet-17130.herokuapp.com/author_project/common/footer.php'; ?>
            
		</body>	
	</html>