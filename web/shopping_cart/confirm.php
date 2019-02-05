<?php
    session_start();

    $firstName = htmlspecialchars($_POST['firstName']); 
    $lastName = htmlspecialchars($_POST['lastName']);
    $street = htmlspecialchars($_POST['street']);
    $city = htmlspecialchars($_POST['city']);
    $state = htmlspecialchars($_POST['state']);
    $zip = htmlspecialchars($_POST['zip']);

?>


<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Confirmation Page</title>
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
            
                <h1>You have selected the following products: </h1>
                
                <div class="products"> 
                    <?php

                    foreach ($_SESSION['orders'] as $order)
                    {
                        $order_clean = htmlspecialchars($order);
                        switch ($order){
                            case "KT_1":
                                echo "<figure class='products_pics' id='fig.1'> 
                                        <img class='gallery_img' width='100px' src='images/KT1_Cover.jpg' alt='Decoy'>
                                        <figcaption>Only $6.99</figcaption>
                                    </figure>";
                                break;
                            case "KT_B":
                                echo "<figure class='products_pics' id='fig.2'> 
                                        <img class='gallery_img' width='100px' src='images/KT_Bundle.jpg' alt='Assassin's Rising Series'>
                                        <figcaption>Only $9.99</figcaption>
                                    </figure>";
                                break;   
                            case "KV_1":
                                echo "<figure class='products_pics' id='fig.3'> 
                                        <img class='gallery_img' width='100px' src='images/KV1_Cover.jpg' alt='Unseen Secrets'>
                                        <figcaption>Only $6.99</figcaption>
                                    </figure>";
                                break;
                            case "KV_B":
                                echo "<figure class='products_pics' id='fig.4'> 
                                        <img class='gallery_img' width='100px' src='images/KV_Bundle.jpg' alt='Shattered Realms Series'>
                                        <figcaption>Only $9.99</figcaption>
                                    </figure>";
                                break;
                            case "F_1":
                                echo "<figure class='products_pics' id='fig.5'> 
                                        <img class='gallery_img' width='100px' src='images/F1_Cover.jpg' alt='Death's Edge'>
                                        <figcaption>Only $6.99</figcaption>
                                    </figure>";                                  
                                break;
                            case "F_B":
                                echo "<figure class='products_pics' id='fig.6'> 
                                        <img class='gallery_img' width='100px' src='images/F_Bundle.jpg' alt='Claws and Steel Series'>
                                        <figcaption>Only $9.99</figcaption>
                                    </figure>";
                                break;
                             case "Z_1":
                                  echo "<figure class='products_pics' id='fig.7'> 
                                        <img class='gallery_img' width='100px' src='images/Z1_Cover.jpg' alt='The First Strain'>
                                        <figcaption>Only $6.99</figcaption>
                                    </figure>";
                                  break;
                            case "Z_B":
                                  echo "<figure class='products_pics' id='fig.7'> 
                                        <img class='gallery_img' width='100px' src='images/Z_Bundle.jpg' alt='Corrupted Genes Series'>
                                        <figcaption>Only $6.99</figcaption>
                                    </figure>";
                                  break;
                              default:
                                  echo "You have not made any orders yet.";
                              }
                        }

                ?> 
                </div>
                
                <h1>To be shipped to the following address: </h1>
                
                <p class="indent" >First Name: <?php echo $firstName; ?>  </p>
                <p class="indent" >Last Name: <?php echo $lastName; ?>  </p>
                <p class="indent" >Street: <?php echo $street; ?>  </p>
                <p class="indent" >City: <?php echo $city; ?>  </p>
                <p class="indent" >State: <?php echo $state; ?>  </p>
                <p class="indent" >Zip: <?php echo $zip; ?>  </p>

                
            </main>
            
            <?php
                include 'modules/footer.php';
            ?>
            
		</body>	
	</html>