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
	
	foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
		{
		  echo $row['book'];
		  echo $row['chapter'];
		  echo $row['verse'];
		  echo $row['content'];
		  echo '<br/>';
		}

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
                    
                echo $result;
                
                ?>
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>