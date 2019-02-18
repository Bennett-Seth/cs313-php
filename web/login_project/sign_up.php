<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';
    
?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Sign Up Page</title>

            <meta name="viewport" content="width=device-width, initial-scale=1">
            
		</head>
		<body> 
            
            <header>
           
                <h1>Become an Avenger!</h1>    
    
            </header>
            
            <nav>
            
                <!-- A full menu for each search option could be useful here... -->
            
            </nav>
            
            <main>
                
                <h2> Sign-Up Below for experimental gama radiation treatments. </h2>
                <h2> Become an Avenger (or a pile of ooze) today! </h2>
                
                <form action='index.php' method='post'>
                    <p>Chose your username:</p>
                    <input type='text' name='username' pattern="[A-Za-z\s]{1,60}" required>
                    <p>Choose your password</p>
                    <input type='password' name='password' pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br>
                    <span>Note:Passwords must be at least 8 characters, with at least one number, one capital letter and one special character.</span> 
                    <input type="hidden" name="action" value="sign_up">
                    <input type='submit' value='Submit'>
                </form>
                       
            </main>
            
            <footer>

                <p> &copy; 2017 - Stark Institute - Location: New York City, New York </p>
    
            </footer>
            
		</body>	
	</html>