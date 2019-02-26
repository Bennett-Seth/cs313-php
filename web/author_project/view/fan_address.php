<?php
    session_start();
  
?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Address Page</title>
            
            <?php include 'common/head.php'; ?> 
            
		</head>
		<body> 
            
            <?php include 'common/header.php'; ?>
            
            <?php include 'common/nav.php'; ?>
            
            
            <main>
                
                <?php 
                    
                    //Post Arc Reader Details
                    if (isset($_SESSION["arcAddressMsg"])){
                            echo $_SESSION["arcAddressMsg"];
                        } else {
                            echo "Session arcAddress not initializing<br>";
                        }
                 ?>
                
                    <p>Update your address below:</p>
                    <form action='../accounts/index.php' method='post'>
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
                        <input type='submit' value='Submit'>
                        </form>
                
            </main>
            
            <?php include 'common/footer.php'; ?>
            
		</body>	
	</html>