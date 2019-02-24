<?php

function callFirstReader($fansId, $db){

        foreach ($db->query("SELECT first_readers.first_readers_id, first_readers.fans_id, stories.stories_id, stories.stories_title FROM first_readers RIGHT JOIN stories ON first_readers.stories_id = stories.stories_id WHERE first_readers.fans_id = '$fansId';") as $row){

        $firstReadId = $row['first_readers_id'];
        $thisFansId = $row['fans_id'];
        $storyId = $row['stories_id'];
        $storyTitle = $row['stories_title'];
            
//echo "$thisFirstReadId<br>";
//echo "$thisFansId<br>";
//echo "$storyId<br>";
//echo "$storyTitle<br>";

        $firstReadMsg = "<p> You are a first reader for: <b>$storyTitle</b>. </p>";
            
        $_SESSION["firstReadMsg"] = $firstReadMsg;
//echo $_SESSION["firstReadMsg"];    
        $_SESSION["firstReadId"] = $firstReadId;
//echo $_SESSION["firstReadId"];
        $_SESSION["feedbackTitle"] = $storyTitle;
      
        }
    }   

function callArcReader($fansId, $db){
     foreach ($db->query("SELECT arc_readers.arc_readers_id, arc_readers.fans_id, stories.stories_id, stories.stories_title FROM arc_readers RIGHT JOIN stories ON arc_readers.stories_id = stories.stories_id WHERE arc_readers.fans_id = '$fansId';") as $row){
                                     
        $arcReadId = $row['arc_readers_id'];
        $thisFanId = $row['fans_id'];
        $storyId = $row['stories_id'];
        $arcTitle =  $row['stories_title'];
         
//echo "$thisArcReadId<br>";
//echo "$thisFanId<br>";
//echo "$storyId<br>";
//echo "$arcTitle<br>";
                                        
        $arcReadMsg = "<p>You are a ARC reader for:<b> $arcTitle</b></p>";
        
        $_SESSION["arcReadMsg"] = $arcReadMsg;
//echo $_SESSION["arcReadMsg"];
         
        $_SESSION["arcReadId"] = $arcReadId;
//echo $_SESSION["arcReadId"];
         
        $_SESSION["arcTitle"] = $arcTitle;
//echo $_SESSION["arcTitle"] ;
         
         
    /*                        
                            
        echo "<p>Do you want to update your mailing address? Do so <form action='fan_address.php' method='post'>
        <input type='hidden' name='arcReadId' value='$thisArcReadId'>
        <input type='submit' value='Here'>
        </form></p>";
        }
    */    
    }
}


function callWinner($fansId, $db){
    foreach ($db->query("SELECT contest_winner.fans_id, stories.stories_id, stories.stories_title FROM contest_winner RIGHT JOIN stories ON contest_winner.stories_id = stories.stories_id WHERE contest_winner.fans_id = '$fansId';") as $row){
                                 
        $thisFanId = $row['fans_id'];
        $storyId = $row['stories_id'];
        $contestReward =  $row['stories_title']; 
        
//echo "$thisFanId<br>";
//echo "$storyId<br>";
//echo "$contestReward<br>";
                                     
        $contestMsg = "<p>You have won an exclusive copy of: <b> $contestReward</b>. Congratulations!</p><p>Please stay tuned for additional contests and giveaways!</p>"; 
        
        $_SESSION["contestMsg"] = $contestMsg;
 //echo $_SESSION["contestMsg"];       
        }
    }

function callPromos ($db){
    $promosList = "";
    foreach ($db->query("SELECT promos_title FROM promos;") as $row){
        $promoTitle = $row['promos_title'];
        $promosList .= "$promoTitle<br>";   
        }       
    return $promosList;
    
// $sql = 'SELECT promos_title FROM promos;';
// $stmt = $db->prepare($sql);
// $stmt->execute();
// $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $stmt->closeCursor();
// return $promosList;    

}

function displayFeedback($firstReadId, $db){
    $feedbackTitle = $_SESSION["feedbackTitle"]; 
    
    foreach ($db->query("SELECT * FROM feedback WHERE first_readers_id = '$firstReadId';") as $row){
                               
    $feedbackId = $row['feedback_id'];
    $firstReadId = $row['first_readers_id'];
    $storyId = $row['stories_id'];
    $feedbackDetails = $row['feedback_details'];
    $feedbackDate = row['feedback_date'];
        
//echo $feedbackId;
//echo $firstReadId;
//echo $storyId;
//echo $feedbackDetails;
//echo $feedbackDate;   
        
    $postFeedback = "<p> You provided the following feedback:<br> <b>$feedbackTitle</b>: $feedbackDetails  </p><br>";
//echo "This is your feedback: $postFeedback<br>";
    
    $_SESSION["postFeedback"] = $postFeedback;
//echo $_SESSION["postFeedback"]; 
        
    $_SESSION["feedbackId"] = $feedbackId;
//echo $_SESSION["feedbackId"]; 
    }
}

function updateFeedback($newFeedback, $feedbackId, $newDate, $db){
    
    $query = 'UPDATE feedback SET feedback_details = :feedback_details, feedback_date = :feedback_date
        WHERE feedback_id = :feedback_id';

    $statement = $db->prepare($query);

    $statement->bindValue(':feedback_details', $newFeedback);
    $statement->bindValue(':feedback_date', $newDate);
    $statement->bindValue(':feedback_id', $feedbackId);

    $statement->execute();
                
//echo "update successful<br>";
                
    foreach ($db->query("SELECT feedback_details FROM feedback WHERE feedback_id = '$feedbackId';") as $row){

        $printFeedback = $row['feedback_details'];
        $postFeedback  = "Your Current Feedback: $printFeedback<br>";  
        $_SESSION["postFeedback "] = $postFeedback;
        
        }    
}

function displayReview($arcReadId, $db){
    $arcTitle = $_SESSION["arcTitle"]; 
    
    foreach ($db->query("SELECT reviews_id, reviews_vendor, reviews_details FROM reviews WHERE arc_readers_id = '$arcReadId';") as $row){
                               
    $reviewsId = $row['reviews_id'];
    $reviewsVendor =  $row['reviews_vendor']; 
    $reviewsDetails =  $row['reviews_details']; 
        
echo $reviewsId;
echo $reviewsVendor;
echo $reviewsDetails;   
        
    $postReview = "<p> You provided the following review:<br> 
    <p> Vendor: $reviewsVendor.</p>
    <p>Title:<b>$arcTitle</b></p> 
    <p> $reviewsDetails  </p>";
//echo "This is your review: $postReview<br>";
    
    $_SESSION["reviewsDetails"] = $reviewsDetails;
//echo $_SESSION["reviewsVendor"]; 

    $_SESSION["reviewsVendor"] = $reviewsVendor;
//echo $_SESSION["reviewsVendor"];     
        
    $_SESSION["postReview"] = $postReview;
//echo $_SESSION["postFeedback"]; 
        
    $_SESSION["reviewsId"] = $reviewsId;
//echo $_SESSION["feedbackId"]; 
    }
}

function updateReview($newReview, $reviewsId, $newVendor, $newDate, $db){
    
    $query = 'UPDATE reviews SET reviews_details = :reviews_details, reviews_date = :reviews_date, reviews_vendor = :reviews_vendor WHERE reviews_id = :reviews_id';

    $statement = $db->prepare($query);

    $statement->bindValue(':reviews_details', $newReview);
    $statement->bindValue(':reviews_date', $newDate);
    $statement->bindValue(':reviews_id', $reviewsId);
    $statement->bindValue(':reviews_vendor', $newVendor);

    $statement->execute();
                
//echo "update successful<br>";
                
    foreach ($db->query("SELECT reviews_details FROM reviews WHERE reviews_id = '$reviewsId';") as $row){

        $printReview = $row['reviews_details'];
        $postReview  = "<p>Vendor: $newVendor </p><p>Your Current Review: $printReview</p>";
        
        $_SESSION["postReview "] = $postReview;
        
        }    
}





?>