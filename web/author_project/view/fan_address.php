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
			<title>Address Page</title>
            
            <?php include '../common/head.php'; ?> 
            
		</head>
		<body> 
            
            <?php include '../common/header.php'; ?>
            
            <?php include '../common/nav.php'; ?>
            
            
            <main>
                
                <?php 
                    
                    foreach ($db->query("SELECT arc_address_street, arc_address_city, arc_address_state, arc_address_zip, arc_address_country 
                    FROM arc_addresses 
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
                        <p>Street: </p>
                        <input type='text' name='street'>
                        <p>City: </p>
                        <input type='text' name='city'>
                        <p>State: </p>
                        <input type='text' name='state'>
                        <p>Zipcode: </p>
                        <input type='text' name='zip'>
                        <p>Country: </p>
                        <input type='text' name='country'>
                        <input type='hidden' name='arc_readers_id' value='$arcReadId'>
                        <input type='submit' value='Submit'>
                        </form>";
                    }
                ?>
                
                
                
            </main>
            
            <?php include '../common/footer.php'; ?>
            
		</body>	
	</html>