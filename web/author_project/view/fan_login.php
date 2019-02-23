<?php
    session_start();

?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Login Page</title>
            
            <?php include 'common/head.php'; ?> 
            
		</head>
		<body> 
            
            <?php include 'common/header.php'; ?>
            
            <?php include 'common/nav.php'; ?>
            
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
                    <form action='index.php' method='post'>
                    <p>What is your email?</p>
                    <input type="email" name="email" placeholder="johnny@gmail.com" required>
                    <p>What is your password?</p>
                    <input type='password' name='password' required>
                    <span>Note:Passwords must be at least 8 characters, with at least one number, one capital letter and one special character.</span> 
                    <input type="hidden" name="action" value="login">
                    <input type='submit' value='Submit'>
                </form>
                </form>
                
                
                <h2> Not a member yet? Sign up <a href="https://floating-inlet-17130.herokuapp.com/author_project/view/fan_reg.php> Sign me up!">Here</a></h2>
                
                
            </main>
            
            <?php include 'common/footer.php'; ?>
            
		</body>	
	</html>