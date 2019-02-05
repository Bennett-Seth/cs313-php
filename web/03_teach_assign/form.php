<?php

    $majors = array("cs" => "Computer Science", "wdd" => "Web Design and Development", "cit" => "Computer Information Technology", "ce" => "Computer Engineering");

?>


<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>PHP Form Activity</title>

		</head>
		<body> 
            <h1> Form Activity</h1>
            <form method="post" action="userInfo.php">
                
                <p>User Name</p>
                <input type="text" name="userName"><br>
                
                <p>User Email</p>
                <input type="email" name="userEmail"><br>

                <p>User Major </p>
                
                    <?php

                    foreach ($majors as $x => $x_value) {
                        echo "<input type='radio' name='major' value='$x_value' id='$x'>" . $x_value;
                        echo "<br>";
                        }
                    ?>
       
                <p>Which Continents Have You Been Too?</p>
<!-- Would this make an array? How to package and unpackage that in PHP? -->             
                
                <input type="checkbox" name="continents[]" id="na" value="na">North America<br>
                <input type="checkbox" name="continents[]" id="sa" value="sa">South America<br>
                <input type="checkbox" name="continents[]" id="eu" value="eu">Europe<br>
                <input type="checkbox" name="continents[]" id="as" value="as">Asia<br>
                <input type="checkbox" name="continents[]" id="au" value="au">Australia<br>
                <input type="checkbox" name="continents[]" id="af" value="af">Africa<br>
                <input type="checkbox" name="continents[]" id="an" value="an">Antartica<br>

                <p>User Comments</p>
                <textarea name="userComments" rows="10" cols="30">Insert your comments here.</textarea>
                
                 <input type="submit" value="Submit">
            </form>
            
		</body>	
	</html>