<?php 

// Get the database connection file
require 'connect.php';

function valUsername($username){
    $valUsername = filter_var($username, FILTER_SANITIZE_STRING);
    return $valUsername;
    }

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and at least 1 special character

function checkPassword($password){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
    return preg_match($pattern, $password);
    }

function signUpUser($username, $hashedPassword){
    
    // The SQL statement
    $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
    
    echo "Your username is: $username <br>";
    echo "Your password is: $hashedPassword <br>";
    
    $db = get_db();
    // Create the prepared statement using the acme connection
    $statement = $db->prepare($query);

    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
    // Insert the data
    $statement->execute();

    // Ask how many rows changed as a result of our insert
    $rowsChanged = $statement->rowCount();

    // Close the database interaction
    $statement->closeCursor();

    // Return the indication of success (rows changed)
    return $rowsChanged;
    }

// Get client data based on an username
function getUser($username){
      $sql = 'SELECT username, password FROM users WHERE username = :username';
      $stmt = $db->prepare($sql);
      $stmt->bindValue(':username', $username, PDO::PARAM_STR);
      $stmt->execute();
      $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
      $stmt->closeCursor();
      return $clientData;
    }

?>