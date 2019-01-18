
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
				<?php include $_SERVER['DOCUMENT_ROOT'].'modules/project_header.php'; ?>
			</header>
            
			<nav>
				<ul class="topnav" id="mainmenu">
					<li class="active"> <a href="index.php">Home</a></li>
					<li> <a href="assignments.php"> Assignments </a></li>
				</ul>
			</nav>
            
            <main> 
				
				<h1> Also known as S. B. Sebrick </h1>
				<div id="bio">
					<img id="profile_pic" width="150 px" src="images/Sebrick_Best.jpg" alt="S. B. Sebrick profile picture">
						<p class="bio_text"> S. B. Sebrick was raised in Vancouver, Washington. </p> 
						<p class="bio_text"> He has published short stories in 2005 and 2006 of Clark College’s annual ‘Phoenix’ Anthology. </p> 
						<p class="bio_text"> He recently finished ‘Persuader's Might’, the last of the ‘Shattered Realms’ novels. </p> 
						<p class="bio_text"> He often posts updates and teasers about the rest of his works from his website at www.sbsebrick.com. </p>
						<p class="bio_text"> Email him at seth@sbsebrick.com </p>
						<p class="bio_text"> You can also join him on, Facebook, Twitter, LinkedIn and Goodreads </p>
                    <div class="clear"> </div>
                </div>
                
                <h1> Special Sale </h1>
                <p> The current time is: </p>
                <?php echo "Today is " . date("Y-m-d") . "<br>"; ?>
                <p> Check my website <a href="https://www.sbsebrick.com/">Here, </a> to make sure you don't miss out on my latest giveaway! </p>
                
                <h1> Author Gallery </h1>
                <div class="galleryPics">
                  <div class="gallery_figs" id="fig1">  
                    <img class="gallery_i" width="100px" src="images/KT_Cover.jpg" alt="Book 1 of the Assassin's Rising Series: Decoy">
                    <p class="gallery_p"><a href="https://www.sbsebrick.com/assassins-rising-series.html">Face demons, monsters and the fate of the Levarion with Kaltor Stratagar, assassin extraordinaire. </a></p>
                    <div class="clear"> </div>
                  </div>  

                  <div class="gallery_figs" id="fig2">  
                    <img class="gallery_i" width="100px" src="images/F1_Cover.jpg" alt="Book 1 of the Claws and Steel Series: Death's Edge">
                    <p class="gallery_p"> <a href="https://www.sbsebrick.com/claws-and-steel-trilogy.html">Peek into this mysterious post-apocalyptic world where those with technology are worshiped as Gods. </a></p>
                      <div class="clear"> </div>
                  </div>  

                  <div class="gallery_figs" id="fig3">  
                    <img class="gallery_i" width="100px" src="images/KV_Cover.jpg" alt="Book 1 of the Shattered Realms Series: Unseen Secrets">
                    <p class="gallery_p"><a href="https://www.sbsebrick.com/shattered-realms-trilogy.html"> Meet the Children of the Sky, where the might of the elements and the power of emotion go hand in hand.</a></p>
                      <div class="clear"> </div>
                  </div>  

                  <div class="gallery_figs" id="fig4">  
                    <img class="gallery_i" width="100px" src="images/Z1_Cover.jpg" alt="Book 1 of the Corrupted Genes Series: The First Strain">
                    <p class="gallery_p"><a href="https://www.sbsebrick.com/corrupted-genes-trilogy.html"> Sprint in a race against time, to cure the human race as the C-21 virus engulfs society as we know it.</a></p>
                      <div class="clear"> </div>
                  </div>   

                </div>
            </main>
			
			<footer>
				<ul class="footerNav" id="footerMenu">
					<li class="active"> <a href="index.php">Home</a></li>
					<li> <a href="assignments.php"> Assignments </a></li>
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
