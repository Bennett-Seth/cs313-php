<?php
   $userName = htmlspecialchars($_POST['userName']); 
   $userEmail = htmlspecialchars($_POST['userEmail']);
        // Is this email being input correctly?
   $userMajor = htmlspecialchars($_POST['major']);
   $userComments = htmlspecialchars($_POST['userComments']);
   
    $continents = $_POST["continents"];
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
            <h2>I have been to: 
                <ul>
                    <?php 
                        foreach ($continents as $continent)
                            {
                           $continent_clean = htmlspecialchars($continent);
                            switch ($continent){
                                case "na":
                                    echo "<li><p>North America</p></li>";
                                    break;
                                case "sa":
                                    echo "<li><p>South America</p></li>";
                                    break;   
                                case "eu":
                                    echo "<li><p>Europe</p></li>";
                                    break;
                                case "as":
                                    echo "<li><p>Asia</p></li>";
                                    break;
                                case "af":
                                    echo "<li><p>Africa</p></li>";
                                    break;
                                case "au":
                                    echo "<li><p>Australia</p></li>";
                                    break;
                                case "an":
                                    echo "<li><p>Antartica</p></li>";
                                    break;
                                default:
                                    echo "You've got some traveling to do!";
                                }
                            }
                    ?> 
                </ul>
            </h2>
		</body>	
	</html>