<?php
    session_start();
    
    if (!$_SESSION['loggedin']){
        header('Location: fan_reg.php');
        exit;
    }

    $fanFirstName = $_SESSION['fanData']['first_name'];
        echo "Ready to send:$fanFirstName<br>";
    $fanLastName = $_SESSION['fanData']['last_name'];
        echo "Ready to send:$fanLastName<br>";
    $promosList = $_SESSION["promosList"];
        echo "Ready to send:$promosList<br>";

?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Superfan Welcome Page</title>
            
            <?php include 'common/head.php'; ?> 
            
		</head>
		<body> 
            
            <?php include 'common/header.php'; ?>
            
            <?php include 'common/nav.php'; ?>
            
            
            <main>
                
                <h2>Welcome <?php echo "$fanFirstName $fanLastName!<br>"?></h2>
                
                <?php 
                    //Lockout Notice
                    if (isset($lockMsg)){
                            echo $lockMsg;
                        }
                ?>
                
                <h2>Here are our current promotions:<br></h2>
                
                <?php 
                
                    if (isset($promosList)){
                        echo "Here is the complete list of possible promotions for you to attend! <br> $promosList<br>";
                    }
                    
                ?>
                
                <hr>
                
                <h2>Join a Promotion</h2>
                <p>You can join any of these promotions by emailing S. B. Sebrick at <a href='seth@sbsebrick.com'>seth@sbsebrick.com</a>. Get your free swag today!</p>
                
            </main>
            
            <?php include 'common/footer.php'; ?>
            
		</body>	
	</html>