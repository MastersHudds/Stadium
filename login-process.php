<?php
session_start();
include_once("stadium-model.php");
$conn = getConnection();

if(isset($_POST['login']))
{
    $email = sanitizeString($_POST['email']);
    $password = ($_POST['password']);
    $msg =[''];

if ($email == "" || $password == "")
{
  return;
}
    $stmt = $conn->prepare("SELECT * FROM users
    WHERE email = :email");
    $stmt->bindValue(':email',$email);
    $stmt->execute();
    $loggedIn=true;
    if($row = $stmt->fetch()){
        if (password_verify($password, $row['password'])) {
              $loggedIn=true;
        }
    }
    if($loggedIn){
        $_SESSION["email"]=$email;
        header( "Location: index.php" );
    }else{
        $_SESSION["error_msg"]="Wrong login details";
        header( "Location: login.php" );
    }
}
?>
</body>
</html>
