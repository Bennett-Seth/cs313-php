
<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>CS 313 Project Homepage</title>
			<meta name="description" content="Presentation of Seth Bennett's coding skills.">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            
            <link rel="stylesheet" href="styles/normalize.css">
			<link rel="stylesheet" href="styles/main.css">
			
			<script src="scripts/main.js"></script> 
			<script src="scripts/jquery-3.3.1.min.js"></script>
            
		</head>
		<body> 
            <header>
				<?php include $_SERVER['DOCUMENT_ROOT'].'/modules/project_header.php'; ?>
			</header>
            
			<nav>
				<ul class="topnav" id="mainmenu">
					<li class="active"> <a href="index.html">Home</a></li>
					<li> <a href="assignments.html"> Assignments </a></li>
				</ul>
			</nav>
            
            <main> 
				
				<h1> Coming Soon </h1>

            </main>
			
			<footer>
				<ul class="footerNav" id="footerMenu">
					<li class="active"> <a href="index.html">Home</a></li>
					<li> <a href="assignments.html"> Assignments </a></li>
				</ul>
            
			</footer>
   
            <script>
    //I put this JavaScript together early in the semester as an assignment for a different class. It uses JavaScript to figure out which nav menu is active and CSS does the rest.
                
var urlString = document.location.href;
var urlArray = urlString.split('/');
var pageHREF=urlArray[urlArray.length-1];

if (pageHREF !==""){
	var menu = document.querySelectorAll('ul#mainmenu li a');
	var i;
	
	//loop through all the menu items in the navigation
	for (i=0; i<menu.length; i++){
		var currentURL=(menu[i].getAttribute("href"));
		menu[i].parentNode.className=""; //turn off hilighting by default
		if (currentURL ===pageHREF) {
			menu[i].parentNode.className="active"; //turn on if a match 
		} // end if
	} // end of search for a match
} // end of if !==
            </script>
            
		</body>	
	</html>