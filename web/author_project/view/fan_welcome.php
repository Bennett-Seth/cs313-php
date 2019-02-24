<?php
    session_start();
    
    if (!$_SESSION['loggedin']){
        header('Location: ../view/fan_reg.php');
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
                    if (isset($lockMsg)){
                            echo $lockMsg;
                        }
                ?>
                
                <h2>You are involved in the following promotions</h2>
                
                <?php 
                    //Post First Reader Details
                    if (isset($_SESSION["firstReadMsg"])){
                            echo $_SESSION["firstReadMsg"];
                            echo "To leave or update your feedback, click <a href='https://floating-inlet-17130.herokuapp.com/author_project/view/fan_feedback.php'>Here</a><br>";
                        } 
                ?>
                
                <?php 
                    //Post Arc Reader Details
                    if (isset($_SESSION["arcReadMsg"])){
                            echo $_SESSION["arcReadMsg"];
                            echo "To leave or update your review, click <a href='https://floating-inlet-17130.herokuapp.com/author_project/view/fan_review.php'>Here</a><br>";
                            echo "To update your mailing address, click <a href='https://floating-inlet-17130.herokuapp.com/author_project/view/fan_review.php'>Here</a><br>";
                        }
                ?>
                
                <?php 
                    //Post Contest Details
                    if (isset($_SESSION["contestMsg"])){
                            echo $_SESSION["contestMsg"];
                        }
                ?>
                
                <hr>
                
                
            </main>
            
             <?php include '../common/footer.php'; ?>
            
		</body>	
	</html>