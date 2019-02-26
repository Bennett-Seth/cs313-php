<?php
    session_start();
  
?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Address Page</title>
            
            <?php include($_SERVER["DOCUMENT_ROOT"] . "/author_project/common/head.php"); ?> 
            
		</head>
		<body> 
            
            <?php include($_SERVER["DOCUMENT_ROOT"] . "/author_project/common/header.php"); ?> 
            
            <?php include($_SERVER["DOCUMENT_ROOT"] . "/author_project/common/nav.php"); ?> 
            
            <main>
                
                <h2> Arc Readers get their very own paperback copies!</h2>
                
                <?php 
                    
                    //Post Arc Reader Details
                    if (isset($_SESSION["arcAddressMsg"])){
                            echo $_SESSION["arcAddressMsg"];
                        } else {
                            echo "Session arcAddress not initializing<br>";
                        }
                 ?>
                    <hr>
                    <p>If you wish to change your shipping address, update your address below:</p>
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
                        <input type='hidden' name='action' value='updateAddress'>
                        <br>
                        <input class='submit' type='submit' value='Submit'>
                        </form>
                
            </main>
            <hr>
            <?php include($_SERVER["DOCUMENT_ROOT"] . "/author_project/common/footer.php"); ?>
            
		</body>	
	</html>