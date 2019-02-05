<?php
    session_start();
    
    if (isset($_SESSION['orders']) == null){
        $_SESSION['orders'] = $_POST["orders"];
    } else {
        //$_SESSION['orders'] = array_merge($_SESSION['orders'], $_POST["orders"]); 
        $_SESSION['orders'] = array_diff($_SESSION['orders'],$_POST["del"]);
        $_SESSION['orders'] = array_values($_SESSION['orders']);     
    }

?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Shopping Cart Page</title>
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

                <h1>Your Current Shopping Cart</h1>
                
                    <form action="viewCart.php" method="post">
                    <div class="products"> 
                    <?php

                    foreach ($_SESSION['orders'] as $order)
                    {
                        $order_clean = htmlspecialchars($order);
                        switch ($order){
                            case "KT_1":
                                echo "<figure class='products_pics' id='fig.1'> 
                                        <img class='gallery_img' width='100px' src='images/KT1_Cover.jpg' alt='Decoy'>
                                        <figcaption>Only $6.99<hr>Remove:<input type='checkbox' name='del[]' id='KT_1' value='KT_1'></figcaption>
                                    </figure>";
                                break;
                            case "KT_B":
                                echo "<figure class='products_pics' id='fig.2'> 
                                        <img class='gallery_img' width='100px' src='images/KT_Bundle.jpg' alt='Assassin's Rising Series'>
                                        <figcaption>Only $9.99<hr>Remove:<input type='checkbox' name='del[]' id='KT_B' value='KT_B'></figcaption>
                                    </figure>";
                                break;   
                            case "KV_1":
                                echo "<figure class='products_pics' id='fig.3'> 
                                        <img class='gallery_img' width='100px' src='images/KV1_Cover.jpg' alt='Unseen Secrets'>
                                        <figcaption>Only $6.99<hr>Remove:<input type='checkbox' name='del[]' id='KV_1' value='KV_1'></figcaption>
                                    </figure>";
                                break;
                            case "KV_B":
                                echo "<figure class='products_pics' id='fig.4'> 
                                        <img class='gallery_img' width='100px' src='images/KV_Bundle.jpg' alt='Shattered Realms Series'>
                                        <figcaption>Only $9.99<hr>Remove:<input type='checkbox' name='del[]' id='KV_B' value='KV_B'></figcaption>
                                    </figure>";
                                break;
                            case "F_1":
                                echo "<figure class='products_pics' id='fig.5'> 
                                        <img class='gallery_img' width='100px' src='images/F1_Cover.jpg' alt='Death's Edge'>
                                        <figcaption>Only $6.99<hr>Remove:<input type='checkbox' name='del[]' id='F_1' value='F_1'></figcaption>
                                    </figure>";                                  
                                break;
                            case "F_B":
                                echo "<figure class='products_pics' id='fig.6'> 
                                        <img class='gallery_img' width='100px' src='images/F_Bundle.jpg' alt='Claws and Steel Series'>
                                        <figcaption>Only $9.99<hr>Remove:<input type='checkbox' name='del[]' id='F_B' value='F_B'></figcaption>
                                    </figure>";
                                break;
                             case "Z_1":
                                  echo "<figure class='products_pics' id='fig.7'> 
                                        <img class='gallery_img' width='100px' src='images/Z1_Cover.jpg' alt='The First Strain'>
                                        <figcaption>Only $6.99<hr>Remove:<input type='checkbox' name='del[]' id='Z_1' value='Z_1'></figcaption>
                                    </figure>";
                                  break;
                            case "Z_B":
                                  echo "<figure class='products_pics' id='fig.7'> 
                                        <img class='gallery_img' width='100px' src='images/Z_Bundle.jpg' alt='Corrupted Genes Series'>
                                        <figcaption>Only $6.99<hr>Remove:<input type='checkbox' name='del[]' id='Z_B' value='Z_B'></figcaption>
                                    </figure>";
                                  break;
                              default:
                                  echo "You have not made any orders yet.";
                              }
                        }

                ?> 
                </div>
                    <button class="viewButton" type="submit" value="Submit"> Remove Selected Orders </button>
                        
                </form>
                
                <hr>
                
                <button class="viewButton"><a href="browse.php">Back to Browse</a></button>
                
                <button class="viewButton"><a href="checkout.php">Checkout</a></button>
                
                
            </main>
            
            <?php
                include 'modules/footer.php';
            ?>
            
		</body>	
	</html>