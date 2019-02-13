<?php
    session_start();

    // Get the database connection file
    require 'connect.php';

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
                
                <h2> Add a new scripture to our database:</h2>
                
                <form action="show_scripture.php" method="post">
                    <p> What book? </p>
                    <input name="book" type="text"><br>
                    <p> Which chapter? </p>
                    <input name="chapter" type="text"><br>
                    <p> Which verse? </p>
                    <input name="verse" type="text"><br>
                    <p> What is the scripture's content?</p>
                    <textarea name="content" rows="10" cols="30"> </textarea><br>
                    <p> Which topics does the scripture apply to? </p>
                        <?php 
                    
                        foreach ($db->query("SELECT name FROM topics;") as $row)
                            {
                                $topic = $row;
                                
                                echo "<input type='checkbox' name='topics[]' value='$topic'>$topic<br>";

                            }
                
                        ?>
                    
                    <input type="submit" value="Submit">    
                
                </form>
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>