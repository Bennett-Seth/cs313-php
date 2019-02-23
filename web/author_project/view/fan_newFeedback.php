<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';

    $newFeedback = htmlspecialchars($_POST['newFeedback']);
        echo "New Feedback: $newFeedback<br>";
    $feedbackId = htmlspecialchars($_POST['feedback_id']);
        echo "Feedback Id: $feedbackId<br>";
    $newDate = date("m/d/Y");
        echo "Today's Date is: $newDate";

?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Feedback Page</title>
            
            <?php include 'common/head.php'; ?> 
            
		</head>
		<body> 
            
            <?php include 'common/header.php'; ?>
            
            <?php include 'common/nav.php'; ?>
            
            
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
            
            <?php include 'common/footer.php'; ?>
            
		</body>	
	</html>