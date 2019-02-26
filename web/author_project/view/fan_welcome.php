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
            
            <?php include($_SERVER["DOCUMENT_ROOT"] . "/author_project/common/head.php"); ?> 
            
		</head>
		<body> 
            
            <?php include($_SERVER["DOCUMENT_ROOT"] . "/author_project/common/header.php"); ?> 
            
            <?php include($_SERVER["DOCUMENT_ROOT"] . "/author_project/common/nav.php"); ?> 
            
            <main>
                
                <h2>Welcome <?php echo "$fanFirstName $fanLastName!"?></h2>
                
                <?php 
                    //Lockout Notice
                    if (isset($lockMsg)){
                            echo $lockMsg;
                        }
                ?>
                
                <h2>You are involved in the following promotions:</h2>
                
                <?php 
                    //Post First Reader Details
                    if (isset($_SESSION["firstReadMsg"])){
                            echo $_SESSION["firstReadMsg"];
                            echo "<p>To leave or update your feedback, click <a href='https://floating-inlet-17130.herokuapp.com/author_project/view/fan_feedback.php'>Here</a></p>";
                        } 
                ?>
                
                <?php 
                    //Post Arc Reader Details
                    if (isset($_SESSION["arcReadMsg"])){
                            echo $_SESSION["arcReadMsg"];
                            echo "<p>To leave or update your review, click <a href='https://floating-inlet-17130.herokuapp.com/author_project/view/fan_review.php'>Here</a></p><br>";
                            echo "<p>To update your mailing address, click <a href='https://floating-inlet-17130.herokuapp.com/author_project/view/fan_address.php'>Here</a></p>";
                        }
                ?>
                
                <?php 
                    //Post Contest Details
                    if (isset($_SESSION["contestMsg"])){
                            echo $_SESSION["contestMsg"];
                        }
                ?>
                
                <h2>Click <a href='https://floating-inlet-17130.herokuapp.com/author_project/view/promos.php'>Here </a>to see our full list of promotions.</h2>
                
                
            </main>
            <hr>
                <?php include($_SERVER["DOCUMENT_ROOT"] . "/author_project/common/footer.php"); ?>
            
		</body>	
	</html>