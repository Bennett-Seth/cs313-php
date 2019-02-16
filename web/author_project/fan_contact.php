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
                
                foreach ($db->query("SELECT first_name, last_name, email FROM fans WHERE fans_id = '$fanId';") as $row){

                            $firstName = $row['first_name'];
                                echo $firstName;
                            $lastName = $row['last_name'];
                                echo $lastName;
                            $email = $row['email'];
                                echo $email;

                            echo "<p>You are: '$firstName' '$lastName' </p>";
                            echo "<p>Your email address is: '$email' </p>";
                    }
                
                echo "<p> Do you wish to change your contact info? Do so below.</p>"
                    
                ?>
                
                <form action="fan_newContact.php" method='post'>
                    <p> Change my first name to: </p>
                    <input name="first_name" type="text"><br>
                    <p> Change my last name to: </p>
                    <input name="last_name" type="text"><br>
                    <p> Change my email to: </p>
                    <input name="email" type="text"><br>
                <?php
                   echo "<input type='hidden' name='fanId' value='$fanId'>"
                ?>    
                    <input type="submit" value="Submit">
                    
                    </form>
                
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>