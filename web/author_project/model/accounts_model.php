<?php
session_start();


function regFan($fanFirstName, $fanLastName, $fanEmail, $hashedPassword, $regDate, $db){ 
    // The SQL statement
    $query = 'INSERT INTO fans (first_name, last_name, email, password, fans_reg_date) VALUES (:first_name, :last_name, :email, :password, :fans_reg_date)';

//make sure $db is working
//print_r($db);

    // Create the prepared statement using the acme connection
    $statement = $db->prepare($query);

    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $statement->bindValue(':first_name', $fanFirstName, PDO::PARAM_STR);
    $statement->bindValue(':last_name', $fanLastName, PDO::PARAM_STR);
    $statement->bindValue(':email', $fanEmail, PDO::PARAM_STR);
    $statement->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
    $statement->bindValue(':fans_reg_date', $regDate, PDO::PARAM_STR);

    // Insert the data
    $statement->execute();

//echo "Registration Complete.";

    // Ask how many rows changed as a result of our insert
    $rowsChanged = $statement->rowCount();
    // Close the database interaction
    $statement->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
    }

// Get client data based on an email address
function getFan($fanEmail, $db){
  $sql = 'SELECT fans_id, first_name, last_name, email, password, fans_reg_date FROM fans WHERE email = :email';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $fanEmail, PDO::PARAM_STR);
  $stmt->execute();
  $fanData = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $fanData;
}

function lockCheck($fansId, $db){
    
    foreach ($db->query("SELECT * FROM lockout WHERE fans_id = '$fansId';") as $row){
                                
        $lockId = $row['lockout_id'];
        $lock_fan_id = $row['fans_id'];
        $lock_reason = $row['lockout_reason'];
        $lock_date = $row['lockout_date'];
                            
        echo "Lock: $lockId, Fan: $lock_fan_id, Cause:$lock_reason, Date:$lock_date<br>";  
                        
        }
    }

function displayContact($fansId, $db){
    foreach ($db->query("SELECT first_name, last_name, email FROM fans WHERE fans_id = '$fansId';") as $row){

            $firstName = $row['first_name'];
                //echo $firstName;
            $lastName = $row['last_name'];
                //echo $lastName;
            $email = $row['email'];
                //echo $email;

            }
                
        $displayMsg = "<p>You are: $firstName $lastName </p>
        <p>Your email address is: $email </p>
        <p> Do you wish to change your contact info? Do so below.</p>";
            
        $_SESSION['displayMsg'] = $displayMsg;
    }

function updateContact($fansId, $db){
    $query = "UPDATE fans SET first_name = :first_name, last_name = :last_name, email = :email WHERE fans_id = '$fansId'";

    $statement = $db->prepare($query);

    $statement->bindValue(':first_name', $newFirst);
    $statement->bindValue(':last_name', $newLast);
    $statement->bindValue(':email', $newEmail);

    $statement->execute();
                
    echo "update successful<br>";
                
    foreach ($db->query("SELECT first_name, last_name, email FROM fans WHERE fans_id = '$fansId';") as $row){

        $newFirstName = $row['first_name'];
            //echo "New First Name: $newFirst <br>";
        $newLastName = $row['last_name'];
            //echo "New Last Name: $newLast <br>";
        $newEmail = $row['email'];
            //echo "New Email: $newEmail <br>";  
        }
    
    $displayMsg = "<p>You are: $newFirstName $newLastName </p>
        <p>Your email address is: $newEmail </p>
        <p> Do you wish to change your contact info? Do so below.</p>";
            
        $_SESSION['displayMsg'] = $displayMsg;   
    }

?>