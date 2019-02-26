<?php
    session_start();

?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Contact Page</title>
            
            <?php include 'common/head.php'; ?> 
            
		</head>
		<body> 
            
            <?php include 'common/header.php'; ?>
            
            <?php include 'common/nav.php'; ?>
            
            
            <main>
                
                <?php 

                  //Post Fan's Contact Details
                    if (isset($_SESSION['displayMsg'])){
                            echo $_SESSION['displayMsg'];
                    } 
                
                ?>
                
                <form action="../accounts/index.php" method='post'>
                    <p> Change my first name to: </p>
                    <input name="firstName" type="text"><br>
                    <p> Change my last name to: </p>
                    <input name="lastName" type="text"><br>
                    <p> Change my email to: </p>
                    <input name="email" type="text"><br>
                    <input type='hidden' name='action' value='updateContact'>
                <?php
                   echo "<input type='hidden' name='fanId' value='$fanId'>"
                ?>    
                    <input type="submit" value="Submit">
                    
                    </form>
                
                
            </main>
            
            <?php include 'common/footer.php'; ?>
            
		</body>	
	</html>