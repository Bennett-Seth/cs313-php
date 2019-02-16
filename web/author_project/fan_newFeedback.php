<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';

    $newFeedback = htmlspecialchars($_POST['newFeedback']);
        echo "New Feedback: $newFeedback<br>";
    $FeedbackId = $_POST['feedback_id'];
        echo "$FeedbackId<br>";

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
/* WILL NEED TO FEEDBACK SWITCH THE FOLLOWING CODE
                    $query = 'UPDATE fans SET first_name = :first_name, last_name = :last_name, email = :email WHERE fans_id = :fans_id';

                    $statement = $db->prepare($query);

                    $statement->bindValue(':first_name', $newFirst);
                    $statement->bindValue(':last_name', $newLast);
                    $statement->bindValue(':email', $newEmail);
                    $statement->bindValue(':fans_id', $fanId);

                    $statement->execute();
                
                    echo "update successful<br>";
                
                    foreach ($db->query("SELECT first_name, last_name, email FROM fans WHERE fans_id = '$fanId';") as $row){

                        $newFirst = $row['first_name'];
                                echo "New First Name: $newFirst <br>";
                        $newLast = $row['last_name'];
                                echo "New Last Name: $newLast <br>";
                        $newEmail = $row['email'];
                                echo "New Email: $newEmail <br>";


                        }
      
*/                    
                ?>
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>