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
                
                <form action="show_scripture.php" method="post">
                    
                    <input name="book" type="text">
                
                    <input name="chapter" type="text">
                    
                    <input name="verse" type="text">
                    
                    <textarea name="content" rows="10" cols="30"> </textarea>
                    
                    <?php 
                    
                    foreach ($db->query("SELECT name FROM topics;") as $row)
						{
                            $topic = $row['name'];
							
							echo "<input type='checkbox' name='topics' value='$topic'> $topic <br>";

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