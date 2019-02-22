<?php

function callFirstReader($fanId, $db){
        foreach ($db->query("SELECT first_readers.first_readers_id, first_readers.fans_id, stories.stories_id, stories.stories_title FROM first_readers RIGHT JOIN stories ON first_readers.stories_id = stories.stories_id WHERE first_readers.fans_id = '$fanId';") as $row){

        $thisFirstReadId = $row['first_readers_id'];
        $thisFanId = $row['fans_id'];
        $storyId = $row['stories_id'];
        $storyTitle = $row['stories_title'];

        return "<p> You are a first reader for: <b>'$storyTitle'</b>. </p>";
    /*                        
        echo "<p>Do you want to view or change your feedback? Do so 
        <form action='fan_feedback.php' method='post'>
        <input type='hidden' name='firstReadId' value='$thisFirstReadId'>
        <input type='submit' value='Here'>
        </form></p>"; 
    */        
        }
    }   

function callArcReader($fanId, $db){
     foreach ($db->query("SELECT arc_readers.arc_readers_id, arc_readers.fans_id, stories.stories_id, stories.stories_title FROM arc_readers RIGHT JOIN stories ON arc_readers.stories_id = stories.stories_id WHERE arc_readers.fans_id = '$fanId';") as $row){
                                     
        $thisArcReadId = $row['arc_readers_id'];
        $thisFanId = $row['fans_id'];
        $storyId = $row['stories_id'];
        $arcTitle =  $row['stories_title'];   
                                        
        return "<p>You are a ARC reader for:<b> $arcTitle</b></p>";  
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


function callWinner($fanId, $db){
    foreach ($db->query("SELECT contest_winner.fans_id, stories.stories_id, stories.stories_title FROM contest_winner RIGHT JOIN stories ON contest_winner.stories_id = stories.stories_id WHERE contest_winner.fans_id = '$fanId';") as $row){
                                 
        $thisFanId = $row['fans_id'];
        $storyId = $row['stories_id'];
        $contestReward =  $row['stories_title']; 
                                     
        return "<p>You have won an exclusive copy of: <b> $contestReward</b>. Congratulations!</p><br>       <p>Please stay tuned for additional contests and giveaways!</p><hr>"; 
                                     
        }
    }

function callPromos ($db){
    foreach ($db->query("SELECT promos_title FROM promos;") as $row){
                                 
        $promoTitle = $row['promos_title'];

        return "$promoTitle<br>";
                            
        }   
    }



?>