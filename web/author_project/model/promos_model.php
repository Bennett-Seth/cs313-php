<?php

function callFirstReader($fansId, $db){

        foreach ($db->query("SELECT first_readers.first_readers_id, first_readers.fans_id, stories.stories_id, stories.stories_title FROM first_readers RIGHT JOIN stories ON first_readers.stories_id = stories.stories_id WHERE first_readers.fans_id = '$fansId';") as $row){

        $thisFirstReadId = $row['first_readers_id'];
        $thisFansId = $row['fans_id'];
        $storyId = $row['stories_id'];
        $storyTitle = $row['stories_title'];
            
//echo "$thisFirstReadId<br>";
//echo "$thisFansId<br>";
//echo "$storyId<br>";
//echo "$storyTitle<br>";

        $firstReadMsg = "<p> You are a first reader for: <b>'$storyTitle'</b>. </p>";
    /*                        
        echo "<p>Do you want to view or change your feedback? Do so 
        <form action='fan_feedback.php' method='post'>
        <input type='hidden' name='firstReadId' value='$thisFirstReadId'>
        <input type='submit' value='Here'>
        </form></p>"; 
    */        
        }
    }   

function callArcReader($fansId, $db){
     foreach ($db->query("SELECT arc_readers.arc_readers_id, arc_readers.fans_id, stories.stories_id, stories.stories_title FROM arc_readers RIGHT JOIN stories ON arc_readers.stories_id = stories.stories_id WHERE arc_readers.fans_id = '$fansId';") as $row){
                                     
        $thisArcReadId = $row['arc_readers_id'];
        $thisFanId = $row['fans_id'];
        $storyId = $row['stories_id'];
        $arcTitle =  $row['stories_title'];
         
//echo "$thisArcReadId<br>";
//echo "$thisFanId<br>";
//echo "$storyId<br>";
//echo "$arcTitle<br>";
                                        
        $arcReadMsg = "<p>You are a ARC reader for:<b> $arcTitle</b></p>";  
    /*                        
        echo "<p>Do you want to change your review? Do so 
        <form action='fan_review.php' method='post'>
        <input type='hidden' name='arcReadId' value='$thisArcReadId'>
        <input type='submit' value='Here'>
        </form></p>"; 
                            
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
        
echo "$thisFanId<br>";
echo "$storyId<br>";
echo "$contestReward<br>";
                                     
        $contestMsg = "<p>You have won an exclusive copy of: <b> $contestReward</b>. Congratulations!</p><br><p>Please stay tuned for additional contests and giveaways!</p><hr>"; 
                                     
        }
    }

function callPromos ($db){
    foreach ($db->query("SELECT promos_title FROM promos;") as $row){
                                 
        $promoTitle = $row['promos_title'];

        return "$promoTitle<br>";              
        }   
    }

?>