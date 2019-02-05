<?php
    session_start();

?>


<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Checkout Page</title>
             <?php
                include 'modules/head.php';
            ?>
            
		</head>
		<body> 
            
            <?php
                include 'modules/header.php';
            ?>
            
            
            <?php
                include 'modules/nav.php';
            ?>
            
            <main>
            
                <h1>Where should we ship your purchase? </h1>
                
                <form action="confirm.php" method="post">
                    <p class="indent">First Name:</p>
                    <input class="indent" type="text" name="firstName"><br>
                    <p class="indent" >Last Name: </p>
                    <input class="indent" type="text" name="lastName"><br>
                    <p class="indent" >Street Address: </p>
                    <input class="indent" type="text" name="street"><br>
                    <p class="indent" >City: </p>
                    <input class="indent" type="text" name="city"><br>
                    <p class="indent" >State: </p>
                    <input class="indent"  type="text" name="state"><br>
                    <p class="indent" >Zip Code: </p>
                    <input class="indent"  type="text" name="zip"><br>
                    <br>
                    <button class="viewButton" type="submit" value="Submit"> Confirm Purchase </button>
 
                    <hr>
                    
                <button class="viewButton"><a href="viewCart.php">Back to Cart</a></button>
                    
                </form>
                
                
            </main>
            
            <?php
                include 'modules/footer.php';
            ?>
            
		</body>	
	</html>