<?php
    session_start();

?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Login Page</title>
            
            <?php include($_SERVER["DOCUMENT_ROOT"] . "/author_project/common/head.php"); ?> 
            
		</head>
		<body> 
            
            <?php include($_SERVER["DOCUMENT_ROOT"] . "/author_project/common/header.php"); ?> 

            <main>
                
                <?php
    
                    echo $message;

                ?>
                
                <h1> Sign in below if you're already an Super Fan.</h1>
                
                <!-- 
pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
onkeypress='doPasswordsMatch()' 
<span id='yesMatch' style='visibility: hidden' >Your passwords match!</span>
<span id='noMatch' style='visibility: hidden'>Your passwords don't match</span><br>
            -->
                
                <form action="https://floating-inlet-17130.herokuapp.com/author_project/accounts/index.php" method="post">
                    <p>What is your email?</p>
                    <input type="email" name="email" placeholder="johnny@gmail.com" required><br>
                    <p>What is your password?</p>
                    <input type='password' name='password' pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required><br>
                    <p>Note:Passwords must be at least 8 characters, with at least one number, one capital letter and one special character.</p> 
                    <input type="hidden" name="action" value="login"><br>
                    <input type='submit' value='Submit'>
                </form>
                
                <h2> Not a member yet? Sign up <a href="https://floating-inlet-17130.herokuapp.com/author_project/view/fan_reg.php"> Here</a></h2>
                
                
            </main>
            <hr>
            <?php include($_SERVER["DOCUMENT_ROOT"] . "/author_project/common/footer.php"); ?>
            
		</body>	
	</html>