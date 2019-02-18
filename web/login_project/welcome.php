<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';
    
    // A valid user exists, log them in
    if ($_SESSION['loggedin'] == TRUE){
        $message = "Welcome $username, are you ready to join the fight?";
    }else {
        include "sign_in.php";
        die();
    }
        

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
                   echo $message;            
                ?>
                
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>