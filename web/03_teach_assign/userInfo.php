<?php
   $userName = htmlspecialchars($_POST['userName']); 
   $userEmail = $_POST['userEmail'];
        // Is this email being input correctly?
   $userMajor = $_POST['userMajor'];
   $userComments = htmlspecialchars($_POST['userComments']);
   $userCont = $_POST['userCont'];
   // $userContArr = array($userCont);
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
                    echo $userCont
                    <br>
                    echo $userContArr
                    <br>
                    echo $userContArr[0]
                    <br>
                    echo $userContArr[1];
                
                    //foreach ($userContArr as $value){
                    //    echo "<h2> I have been too: $value </h2><br>";
                    //    }
                ?> 
            
            </h2>
		</body>	
	</html>