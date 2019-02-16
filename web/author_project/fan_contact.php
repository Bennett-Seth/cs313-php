<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';

    $myFan = htmlspecialchars($_POST['fanId']);

    if (isset($_SESSION['superFan']) == null){
        $_SESSION['superFan'] = $db->query("SELECT * FROM fans WHERE fans_id = '$myFan';");

    } else {
        echo "Superfan session already set.";
    }

    foreach (($_SESSION['superFan']) as $row){
		$fanId = $row['fans_id'];
            echo "$fanId <br>";
		$fanFirstName = $row['first_name'];
            echo "$fanFirstName <br>";
		$fanLastName = $row['last_name'];
            echo "$fanLastName <br>";
        }
    
?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Fan Reference Page</title>

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
                
                <?php 
                    
                 echo "Test: $fanId"; 
                
                ?>
                
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>