<?php
    session_start();

?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Scripture Reference Page</title>

            <meta name="viewport" content="width=device-width, initial-scale=1">
            
		</head>
		<body> 
            
            <header>
           
                <h1> Scripture Resources </h1>    
    
            </header>
            
            <main>
                
                <form action="DB_reference.php" method="post">
                    
                    <select name="book">
                        <option id="John" value="John"> John </option>
                        <option id="Doctrine and Covenants" value="Doctrine and Covenants"> Doctrine and Covenants </option>
                        <option id="Mosiah" value="Mosiah"> Mosiah </option>
                    </select>
                    <input type="submit" value="Submit">
                    
                </form>
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>