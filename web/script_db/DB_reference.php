<?php
    // Get the database connection file
    require 'connect.php';

    $refBook = htmlspecialchars($_POST['book']);

?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Scripture Reference Response</title>

            <meta name="viewport" content="width=device-width, initial-scale=1">
            
		</head>
		<body> 
            
            <header>
           
                <h1> Scripture Resources </h1>    
    
            </header>
            
            <main>
                
                <?php 
                    
                	foreach ($db->query("SELECT * FROM scriptures WHERE book = '$refBook';") as $row)
						{
							$book = $row['book'];
							$chapter = $row['chapter'];
							$verse = $row['verse'];
							$id = $row['scriptures_id'];
							
							echo "<b>$book</b> $chapter:$verse - <a href='content.php?id=$id'>Read it here</a><br>";
						}
                
                ?>
                
            </main>
            
            <footer>
    
            </footer>
            
		</body>	
	</html>