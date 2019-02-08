<?php
    session_start();
    
    // Get the database connection file
    require 'connect_Heroku.php';

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
                
<!-- This will be replaced by "login" functionality later in the project. -->
                
                <h2> Which fan are you? </h2>
                    <form action="fan_results.php" method="post">
                        <select name="fan">
                            <?php 
                                foreach ($db->query("SELECT first_name FROM fans;") as $row)
                                    {
                                        $fan = $row['first_name'];
                                        echo "<option id="$fan" value="$fan"> $fan </option><br>";
                                    }
                            ?>
                        </select>
                        <input type="submit" value="Submit">
                    </form>

            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>