<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';

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
                
                                         
                ?>
                
            </main>
            
            <?php include 'common/footer.php'; ?>
            
		</body>	
	</html>