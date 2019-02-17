
<?php
    session_start();
    
    // Get the database connection file
    require 'connect.php';
    
    $arcId = $_POST['arc_readers_id'];
        echo "Arc Id is: $arcId<br>";
    $arcStreet = htmlspecialchars($_POST['street']);
        echo "Street is: $arcStreet <br>";
    $arcCity = htmlspecialchars($_POST['city']);
        echo "City is: $arcCity<br>";
    $arcState = htmlspecialchars($_POST['state']);
        echo "State is: $arcState<br>";
    $arcZip = htmlspecialchars($_POST['zip']);
        echo "Zipcode is: $arcZip<br>";
    $arcCountry = htmlspecialchars($_POST['country']);
        echo "Country is: $arcCountry<br>";
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
                
                <h1>Your new review is:</h1>
                
                <?php 
                              
                    $query = 'UPDATE arc_addresses 
                    SET arc_address_street = :arc_address_street, 
                    arc_address_city = :arc_address_city, 
                    arc_address_state = :arc_address_state, 
                    arc_address_zip = :arc_address_zip,
                    arc_address_country = :arc_address_country 
                    WHERE arc_readers_id = :arc_readers_id';

                    $statement = $db->prepare($query);

                    $statement->bindValue(':arc_address_street', $arcStreet);
                    $statement->bindValue(':arc_address_city', $arcCity);
                    $statement->bindValue(':arc_address_state', $arcState);
                    $statement->bindValue(':arc_address_zip', $arcZip);
                    $statement->bindValue(':arc_address_country', $arcCountry);
                    $statement->bindValue(':arc_readers_id', $arcId);

                    $statement->execute();
                
                    echo "update successful<br>";
                
                    foreach ($db->query("SELECT arc_address_street, 
                    arc_address_city, arc_address_state, arc_address_zip,
                    arc_address_country
                    FROM arc_addresses 
                    WHERE arc_addresses_id = '$arcId';") as $row){

                        $newStreet = $row['arc_address_street'];
                            echo "New Street: $newStreet <br>";
                        
                        $newCity = $row['arc_address_city'];
                            echo "New City: $newCity <br>";
                        
                        $newState = $row['arc_address_state'];
                            echo "New State: $newState <br>";
                        
                        $newZip = $row['arc_address_zip'];
                            echo "New Zip Code: $newZip <br>";
                        
                        $newCountry = $row['arc_address_country'];
                            echo "New Country: $newCountry <br>";
                    
                        }  
                          
                ?>
                
                
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>