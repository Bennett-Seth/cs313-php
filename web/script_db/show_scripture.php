<?php
    session_start();

    // Get the database connection file
    require 'connect.php';

    $addBook = htmlspecialchars($_POST['book']);
    $addChapter = htmlspecialchars($_POST['chapter']);
    $addVerse = htmlspecialchars($_POST['verse']);
    $addContent = htmlspecialchars($_POST['content']);
    $addTopic = htmlspecialchars($_POST['topics']);

    echo $addBook;
    echo $addChapter;
    echo $addVerse;
    echo $addContent;



    foreach ($addTopic as $row)
        {
            $topic = $row['name'];              
            echo $topic;

        }
    
    
/*
    $db->query("INSERT INTO scriptures VALUES ($addBook
    ,$addChapter
    ,$addVerse
    ,$addContent
    );"
    
    $db->query("INSERT INTO scriptures_by_topics VALUES ($addBook
    ,$addChapter
    ,$addTopic
    ) ;"
*/

?>

<!DOCTYPE HTML>
	<html lang="en-us">
		<head>
			<meta charset="utf-8">
			<title>Scripture Reference Page</title>

            <meta name="viewport" content="width=device-width, initial-scale=1">
            
		</head>
		<body> 
            
            <header>
           
                <h1> Scripture Resources </h1>    
    
            </header>
            
            <main>
               
                
                
                <?php
                
               /*
               
                foreach ($db->query("SELECT contest_winner.fans_id, stories.stories_id, stories.stories_title FROM contest_winner RIGHT JOIN stories ON contest_winner.stories_id = stories.stories_id WHERE contest_winner.fans_id = '$fanId';") as $row){

                                $thisFanId = $row['fans_id'];
                                $storyId = $row['stories_id'];
                                $contestReward =  $row['stories_title']; 

                                echo "You have won an exclusive copy of $contestReward. Congratulations!<br>";

                                echo "Please stay tuned for additional contests and giveaways!<br><hr>"; 

                                }
               
                */
                
                ?>
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>