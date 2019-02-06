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
                        <option id="john" value="john"> John </option>
                        <option id="d&c" value="d&c"> Doctrine and Covenants </option>
                        <option id="mosiah" value="mosiah"> Mosiah </option>
                    </select>
                    <input type="submit" value="Submit">
                    
                </form>
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>