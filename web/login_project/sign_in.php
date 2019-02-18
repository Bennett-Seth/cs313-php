<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';
    

?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Sign-In Page</title>

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
                
                <h1> Sign in below if you're already an Avenger.</h1>
                
                <form action="index.php" method="post">
                    <form action='index.php' method='post'>
                    <p>Chose your username:</p>
                    <input type='text' name='username' pattern="[A-Za-z\s]{1,60}" required>
                    <p>Choose your password</p>
                    <input type='password' name='password' pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                    <span>Note:Passwords must be at least 8 characters, with at least one number, one capital letter and one special character.</span> 
                    <input type="hidden" name="action" value="sign_in">
                    <input type='submit' value='Submit'>
                </form>
                </form>
                
                
                <h2> Not a member yet?</h2>
                
                <a href="sign_up.php"> Sign me up!</a>
                
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>