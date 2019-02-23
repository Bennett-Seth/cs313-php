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
                    if (isset($firstReadMsg)){
                            echo $firstReadMsg;
                        } 
                ?>
                
                <?php 
                    //Post First Reader Details
                    if (isset($arcReadMsg)){
                            echo $arcReadMsg;
                        }
                ?>
                
                <?php 
                    //Post First Reader Details
                    if (isset($contestMsg)){
                            echo $contestMsg;
                        }
                ?>
                
                <hr>
                
                
            </main>
            
            <?php include 'common/footer.php'; ?>
            
		</body>	
	</html>