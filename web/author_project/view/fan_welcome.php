<?php
    session_start();
    
    if (!$_SESSION['loggedin']){
        header('Location: fan_reg.php');
        exit;
    }

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
                
                <h2>You are involved in the following promotions</h2>
                
                <?php 
                    //Post First Reader Details
                    if (isset($_SESSION["firstReadMsg"])){
                            echo $_SESSION["firstReadMsg"];
                        } 
                ?>
                
                <?php 
                    //Post First Reader Details
                    if (isset($_SESSION["arcReadMsg"])){
                            $_SESSION["arcReadMsg"];
                        }
                ?>
                
                <?php 
                    //Post First Reader Details
                    if (isset($_SESSION["contestMsg"])){
                            echo $_SESSION["contestMsg"];
                        }
                ?>
                
                <hr>
                
                <?php 
                
                    if (isset($promosList)){
                        echo "Here is the complete list of possible promotions for you to attend! <br> $promosList<br>";
                    }
                    
                ?>
                
                
            </main>
            
             <?php include 'common/footer.php'; ?>
            
		</body>	
	</html>