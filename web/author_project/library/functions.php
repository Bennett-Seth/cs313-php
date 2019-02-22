<?php 
session_start();

function valEmail($fanEmail){
    $valEmail = filter_var($fanEmail, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

function checkExistingEmail($fanEmail, $db) {
  $sql = 'SELECT email FROM fans WHERE email = :email';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $fanEmail, PDO::PARAM_STR);
  $stmt->execute();
  $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
  $stmt->closeCursor();
  if(empty($matchEmail)){
    return 0;
  } else {
    return 1;
  }
}

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($fanPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
  return preg_match($pattern, $fanPassword);
}

function matchPasswords($fanPassword, $fanPasswordRepeat){
    if ($fanPassword === $fanPasswordRepeat){
        return true;
    } else {
        return false;
    }
}
?>

























































?>