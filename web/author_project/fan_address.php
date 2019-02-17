<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';

    $arcReadId = $_POST['arcReadId'];
        echo "My Arc Reader Id Is: $arcReadId";  
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
           
                <h1> First Reader Resources </h1>    
    
            </header>
            
            <nav>
            
                <!-- A full menu for each search option could be useful here... -->
            
            </nav>
            
            <main>
                
                <?php 
                    
                    foreach ($db->query("SELECT arc_address_street, arc_address_city, arc_address_state, arc_address_zip, arc_address_country 
                    FROM arc_address 
                    WHERE arc_readers_id = '$arcReadId';") as $row){
                                     
                        $street = $row['arc_address_street'];
                        $city = $row['arc_address_city'];
                        $state = $row['arc_address_state'];
                        $zip = $row['arc_address_zip'];
                        $country = $row['arc_address_country'];
                            
                        echo "<p>Your address is:<br></p>";
                        echo "Street: $street<br>";
                        echo "City: $city<br>";
                        echo "State: $state<br>";
                        echo "Zip: $zip<br>";
                        echo "Country: $country<br>";
                        
                    echo "Update your address below:<br>";
                    echo "<form action='fan_newAddress.php' method='post'>
                        <input type='text' name='street'>
                        <input type='text' name='city'>
                        <input type='text' name='state'>
                        <input type='text' name='zip'>
                        <input type='text' name='country'>
                        <input type='hidden' name='arc_readers_id' value='$arcReadId'>
                        <input type='submit' value='Submit'>
                        </form>";
                    }
                ?>
                
                
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>