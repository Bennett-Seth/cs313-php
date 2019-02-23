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
            
            <?php include 'https://floating-inlet-17130.herokuapp.com/author_project/common/head.php'; ?> 
            
		</head>
		<body> 
            
            <?php include 'https://floating-inlet-17130.herokuapp.com/author_project/common/header.php'; ?>
            
            <?php include 'https://floating-inlet-17130.herokuapp.com/author_project/common/nav.php'; ?>
            
            
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
                           echo $_SESSION["arcReadMsg"];
                        }
                ?>
                
                <?php 
                    //Post First Reader Details
                    if (isset($_SESSION["contestMsg"])){
                            echo $_SESSION["contestMsg"];
                        }
                ?>

                
            </main>
            
            <?php include 'https://floating-inlet-17130.herokuapp.com/author_project/common/footer.php'; ?>
            
		</body>	
	</html>