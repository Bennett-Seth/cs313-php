<?php
	// Get the database connection file
    require 'connect.php';
	
	$id = $_GET['id'];
	$result = ($db->query("SELECT * FROM scriptures WHERE scriptures_id = '$id';"); 
	$book = null;
	$chapter = null;
	$content = null;
	$verse = null;
	$scriptRef = null;

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
                    
                	foreach ($result as $row){
						$book = $row['book'];
						$chapter = $row['chapter'];
						$content = $row['content'];
						$verse = $row['verse'];
						$scriptRef = "$book $chapter:$verse";
						
						echo "$scriptRef - $content<br>";
					}
                
                ?>
                
            </main>
            
            <footer>
    
            </footer>
            
		</body>	
	</html>