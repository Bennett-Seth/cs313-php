<?php
    session_start();

    // Get the database connection file
    require 'connect.php';

    $addBook = htmlspecialchars($_POST['book']);
    $addChapter = htmlspecialchars($_POST['chapter']);
    $addVerse = htmlspecialchars($_POST['verse']);
    $addContent = htmlspecialchars($_POST['content']);
    $addTopic = $_POST['topics'];

    echo "$addBook <br>";
    echo "$addChapter <br>";
    echo "$addVerse <br>";
    echo "$addContent <br>";

    foreach ($addTopic as $row) {
        $topicName = $row['name']; 
        echo "$topicName <br>";
    }
    
    $query = 'INSERT INTO scriptures (book, chapter, verse, content) 
    VALUES (:book, :chapter, :verse, :content)';

    $statement = $db->prepare($query);

    $statement->bindValue(':book', $addBook);
	$statement->bindValue(':chapter', $addChapter);
	$statement->bindValue(':verse', $addVerse);
	$statement->bindValue(':content', $addContent);

    $statement->execute();

	echo "SQL Scripture update complete. <br>";
	
	foreach ($addTopic as $row)
        {
            $topicName = $row['name']; 
        
            $query = 'INSERT INTO scriptures_by_topics (scriptures_id, topics_id) 
				VALUES ( 
				(SELECT scriptures_id FROM scriptures 
					WHERE book = :book
					AND chapter = :chapter
					AND verse = :verse)
				, (SELECT topics_id FROM topics
                    WHERE
                    name = :name)
				);';
        
            $statement = $db->prepare($query);
            
            $statement->bindValue(':book', $addBook);
	        $statement->bindValue(':chapter', $addChapter);
	        $statement->bindValue(':verse', $addVerse);
		    $statement->bindValue(':name', $topicName);
            
            $statement->execute();
       
            echo "The topic: $topicName, was successfully added to the scripture. <br>";

        }

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
                
                echo "Our database holds the following scriptures:<br>";
               
                foreach ($db->query("SELECT scriptures.book, scriptures.chapter, scriptures.verse, topics.name 
				FROM scriptures 
				LEFT JOIN scriptures_by_topics 
				ON scriptures_by_topics.scriptures_id = scriptures.scriptures_id 
				LEFT JOIN  topics 
				ON scriptures_by_topics.topics_id = topics.topics_id;") as $row){

                    $showBook = $row['book'];
                    $showChapter = $row['chapter'];
                    $showVerse = $row['verse'];
                    $showTopic = $row['name'];

                    echo "<b>$showBook $showChapter:$showVerse </b>: Which is about $showTopic <br>";

                }
            
                
                ?>
            </main>
            
            <footer>

                <p> &copy; 2017 - Golden Bullet Publishing - Location: Washington State </p>
    
            </footer>
            
		</body>	
	</html>