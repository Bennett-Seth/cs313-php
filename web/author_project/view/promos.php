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
            
            <?php include '../common/head.php'; ?> 
            
		</head>
		<body> 
            
            <?php include '../common/header.php'; ?>
            
            <?php include '../common/nav.php'; ?>
            
            
            <main>
                
                <h2>Welcome <?php echo "$fanFirstName $fanLastName!<br>"?></h2>
                
                <?php 
                    //Lockout Notice
                    if (isset(echo $lockMsg)){
                            echo $lockMsg;
                        }
                ?>
                
                <h2>Here are our current promotions:<br></h2>
                
                <?php
                    echo $promosList;        
                                                        
                ?>
                
                
            </main>
            
            <?php include '../common/footer.php'; ?>
            
		</body>	
	</html>