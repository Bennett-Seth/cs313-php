<?php
    session_start();
    // Get the database connection file
    //require_once 'connections.php';

    try
        {
          $dbUrl = getenv('DATABASE_URL');

          $dbOpts = parse_url($dbUrl);

          $dbHost = $dbOpts["host"];
          $dbPort = $dbOpts["port"];
          $dbUser = $dbOpts["user"];
          $dbPassword = $dbOpts["pass"];
          $dbName = ltrim($dbOpts["path"],'/');

          $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $ex)
        {
          echo 'Error!: ' . $ex->getMessage();
          die();
        }
    
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
                    
                	foreach ($db->query("SELECT book, chapter, verse, content FROM scriptures WHERE book = '$refBook';") as $row)
						{
							$book = $row['book'];
							$chapter = $row['chapter'];
							$verse = $row['verse'];
							$content = $row['content'];
							
							echo "<b>$book</b> $chapter:$verse - \"$content\" <br>";
						}
                
                ?>
                
            </main>
            
            <footer>
    
            </footer>
            
		</body>	
	</html>