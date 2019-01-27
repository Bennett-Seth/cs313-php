<?php
    session_start();
?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Product Browsing Page</title>

            <?php
                include 'modules/head.php';
            ?>
            
		</head>
		<body> 
            
            <?php
                include 'modules/header.php';
            ?>
            
            
            <?php
                include 'modules/nav.php';
            ?>
            
            <main>
                
                <h2> Check the boxes below to select your purchases. </h2>
                    <form action="viewCart.php" method="post">
                    <div class="products"> 
                        <figure class="products_pics" id="fig.1">
                            <img class="gallery_img" width="100px" src="images/KT1_Cover.jpg" alt="Decoy">
                            <figcaption>Only $6.99 <hr> Add to Cart <input type="checkbox" name="orders[]" id="KT_1" value="KT_1"></figcaption>
                        </figure>

                        <figure class="products_pics" id="fig.2">
                            <img class="gallery_img" width="100px" src="images/KT_Bundle.jpg" alt="Assassin's Rising Series">
                            <figcaption>Only $9.99<hr> Add to Cart <input type="checkbox" name="orders[]" id="KT_B" value="KT_B"></figcaption>
                        </figure>

                        <figure class="products_pics" id="fig.3">
                            <img class="gallery_img" width="100px" src="images/KV1_Cover.jpg" alt="Unseen Secrets">
                            <figcaption>Only $6.99<hr> Add to Cart <input type="checkbox" name="orders[]" id="KV_1" value="KV_1"></figcaption>
                        </figure>

                        <figure class="products_pics" id="fig.4">
                            <img class="gallery_img" width="100px" src="images/KV_Bundle.jpg" alt="Shattered Realms Series">
                            <figcaption>Only $9.99<hr> Add to Cart <input type="checkbox" name="orders[]" id="KV_B" value="KV_B"></figcaption>
                        </figure>
                
                        <figure class="products_pics" id="fig.5">
                            <img class="gallery_img" width="100px" src="images/F1_Cover.jpg" alt="Death's Edge">
                            <figcaption>Only $6.99<hr> Add to Cart <input type="checkbox" name="orders[]" id="F_1" value="F_1"></figcaption>
                        </figure>
                        
                        <figure class="products_pics" id="fig.6">
                            <img class="gallery_img" width="100px" src="images/F_Bundle.jpg" alt="Claws and Steel Series">
                            <figcaption>Only $9.99<hr> Add to Cart <input type="checkbox" name="orders[]" id="F_B" value="F_B"></figcaption>
                        </figure>
                        
                        <figure class="products_pics" id="fig.7">
                            <img class="gallery_img" width="100px" src="images/Z1_Cover.jpg" alt="The First Strain">
                            <figcaption>Only $6.99<hr> Add to Cart <input type="checkbox" name="orders[]" id="Z_1" value="Z_1"></figcaption>
                        </figure>
                        
                        <figure class="products_pics" id="fig.8">
                            <img class="gallery_img" width="100px" src="images/Z_Bundle.jpg" alt="Corrupted Genes Series">
                            <figcaption>Only $9.99<hr> Add to Cart<input type="checkbox" name="orders[]" id="Z_B" value="Z_B"></figcaption>
                        </figure>
                    
                </div>
                        <button class="viewButton" type="submit" value="Submit"> View Cart </button>
                </form>
                
                
            </main>
            
            <?php
                include 'modules/footer.php';
            ?>
            
		</body>	
	</html>