<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';

    $fanId = $_POST['fanId'];
        echo "$fanId<br>";
    $newFirst = htmlspecialchars($_POST['first_name']);
        echo "$newFirst<br>";
    $newLast = htmlspecialchars($_POST['last_name']);
        echo "$newLast<br>";
    $newEmail = htmlspecialchars($_POST['email']);
        echo "$newEmail<br>";
?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Contact Page</title>
            
            <?php include 'https://floating-inlet-17130.herokuapp.com/author_project/common/head.php'; ?> 
            
		</head>
		<body> 
            
            <?php include 'https://floating-inlet-17130.herokuapp.com/author_project/common/header.php'; ?>
            
            <?php include 'https://floating-inlet-17130.herokuapp.com/author_project/common/nav.php'; ?>
            
            
            <main>
                
                <h2>Your new contact information is: </h2>
               
                <?php

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
      
                    
                ?>
                
            </main>
            
           <?php include 'https://floating-inlet-17130.herokuapp.com/author_project/common/footer.php'; ?>
            
		</body>	
	</html>