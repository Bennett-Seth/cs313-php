<?php
    session_start();

?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Login Page</title>
            
            <?php include '../common/head.php'; ?> 
            
		</head>
		<body> 
            
            <?php include '../common/header.php'; ?>
            
            <?php include '../common/nav.php'; ?>
            
            <main>
                
                <h1> Sign in below if you're already an Avenger.</h1>
                
                <form action="../accounts/index.php" method="post">
                    <form action='index.php' method='post'>
                    <p>What is your email?</p>
                    <input type="email" name="clientEmail" placeholder="johnny@gmail.com" required>
                    <p>What is your password?</p>
                    <input type='password' name='password' pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                    <span>Note:Passwords must be at least 8 characters, with at least one number, one capital letter and one special character.</span> 
                    <input type="hidden" name="action" value="login">
                    <input type='submit' value='Submit'>
                </form>
                </form>
                
                
                <h2> Not a member yet?</h2>
                
                <a href="sign_up.php"> Sign me up!</a>
                
                
            </main>
            
            <?php include '../common/footer.php'; ?>
            
		</body>	
	</html>