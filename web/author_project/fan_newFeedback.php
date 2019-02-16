<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';

    $newReview = htmlspecialchars($_POST['newReview']);
        echo "New Review: $newReview<br>";
    $newVendor = htmlspecialchars($_POST['reviews_vendor']);
        echo "New Vendor: $newVendor<br>";
    $reviewId = htmlspecialchars($_POST['reviews_id']);
        echo "Review Id: $reviewId<br>";

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
                
                <h2>Your new contact information is: </h2>
               
                <?php
                
                    $query = 'UPDATE feedback SET feedback_details = :feedback_details, feedback_date = :feedback_date
                    WHERE feedback_id = :feedback_id';

                    $statement = $db->prepare($query);

                    $statement->bindValue(':feedback_details', $newFeedback);
                    $statement->bindValue(':feedback_date', $newDate);
                    $statement->bindValue(':feedback_id', $feedbackId);

                    $statement->execute();
                
                    echo "update successful<br>";
                
                    foreach ($db->query("SELECT feedback_details FROM feedback WHERE feedback_id = '$feedbackId';") as $row){

                        $printFeedback = $row['feedback_details'];
                                echo "New Feedback: $printFeedback<br>";
                    
                        }                         
                ?>
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>