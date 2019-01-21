<?php
   $userName = htmlspecialchars($_POST['userName']); 
   $userEmail = $_POST['userEmail'];
        // Is this email being input correctly?
   $userMajor = $_POST['userMajor'];
   $userComments = htmlspecialchars($_POST['userComments']);
   $userCont[] = $_POST['userCont[]'];
        // How to use as an array?
?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>PHP Form Response</title>
		</head>
        
		<body>  
            <h1>Welcome: <?php echo $userName; ?>  </h1>
            <h2>Email: <?php echo $userEmail; ?>  </h2>
            <h2>Major: <?php echo $userMajor; ?>  </h2>
            <h2>Comments: <?php echo $userComments; ?>  </h2>
            <h2>Your Continents: 
                <?php 
                    foreach ($userCont as $value)
                        echo "<h2> I have been too: $value </h2>";
                ?> 
            
            </h2>
		</body>	
	</html>