<?php
    session_start();

?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Registration Page</title>
            
            <?php include 'common/head.php'; ?> 
            
		</head>
		<body> 
            
            <?php include 'common/header.php'; ?>
            
            <?php include 'common/nav.php'; ?>
            
            <main>
                
                <h2> Ready to become a Super Fan? </h2>
                <h2> Sign up below for swag, free stories and more! </h2>
                
                <h1>NOTE: special password restrictions are disabled </h1>
            <!-- 
pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" 
onkeypress='doPasswordsMatch()' 
<span id='yesMatch' style='visibility: hidden' >Your passwords match!</span>
<span id='noMatch' style='visibility: hidden'>Your passwords don't match</span><br>
            -->
                
                <form action='accounts/index.php' method='post'>
                    <p>Chose your first name:</p>
                    <input type='text' name='firstName' pattern="[A-Za-z\s]{1,60}" required>
                    <p>Chose your last name:</p>
                    <input type='text' name='lastName' pattern="[A-Za-z\s]{1,60}" required>
                    <p>Email Address:</p>
                    <input type="email" name="email" required>
                    <p>Choose your password:</p>
                    <input type='password' name='password' id='password' required><br>
                    <p>Please repeat your password below:</p>
                    <input type='password' name='password_repeat' id='password_repeat'  required><br>
                    <span>Note:Passwords must be at least 8 characters, with at least one number, one capital letter and one special character.</span><br>
                    
                    <input type="hidden" name="action" value="register">
                    <input type='submit' value='Submit'>
                </form>
                
                <h2>Already a Super Fan? Login <a href="fan_login.php">Here</a></h2>
                       
            </main>
            
            <?php include 'common/footer.php'; ?>
            
		</body>	
	</html>