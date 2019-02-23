<?php
session_start();


function regFan($fanFirstName, $fanLastName, $fanEmail, $hashedPassword, $regDate, $db){ 
// The SQL statement
$query = 'INSERT INTO fans (first_name, last_name, email, password, fans_reg_date) VALUES (:first_name, :last_name, :email, :password, :fans_reg_date)';
    
//make sure $db is working
print_r($db);
    
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

echo "Registration Complete.";
    
// Ask how many rows changed as a result of our insert
$rowsChanged = $statement->rowCount();
// Close the database interaction
$statement->closeCursor();
// Return the indication of success (rows changed)
return $rowsChanged;
}

// Get client data based on an email address
function getFan($fanEmail, $db){
    
    foreach ($db->$query("SELECT fans_id, first_name, last_name, email, password, fans_reg_date FROM fans WHERE email = '$fanEmail';") as $row){
     
        $fansId = $row['fans_id'];
        $fanFirstName = $row['first_name'];
        $fanLastName = $row['last_name'];
        $fanPassword = $row['email'];
        $fanEmail = $row['password'];
        $fanRegDate = $row['fans_reg_date'];
                            
        echo "$fansId<br>";
        echo "$fanFirstName<br>";
        echo "$fanLastName<br>";
        echo "$fanPassword<br>";
        echo "$fanEmail<br>";
        echo "$fanRegDate<br>";
    }

}

function lockCheck($fansId, $db){
    
    foreach ($db->query("SELECT * FROM lockout WHERE fans_id = '$fanId';") as $row){
                                
        $lockId = $row['lockout_id'];
        $lock_fan_id = $row['fans_id'];
        $lock_reason = $row['lockout_reason'];
        $lock_date = $row['lockout_date'];
                            
        echo "Lock: $lockId, Fan: $lock_fan_id, Cause:$lock_reason, Date:$lock_date<br>";  
                        
        }
    }




?>