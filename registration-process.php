process-booking<?php
    session_start();
    include('stadium-model.php');
    extract($_POST);
$conn = getConnection();


if(isset($_POST["submitBtn"])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    if ($name == "" || $address == "" || $postcode == "" || $phone == "" || $email == ""
        || $password == "") {
        return;
    }
//SQL INSERT for adding a new row
//Using a prepared statement to bind the values from the form to populate the users table
    $query = "INSERT INTO users ( name, email, password) VALUES
( :name, :email, :password)";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);
    $stmt->execute();


//Using a prepared statement to bind the values from the form to populate the customers table
    $query = "INSERT INTO customers ( Name, Address, Post_Code, Phone, Email) VALUES
( :name, :address, :postcode, :phone, :email)";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':address', $address);
    $stmt->bindValue(':postcode', $postcode);
    $stmt->bindValue(':phone', $phone);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $conn = NULL;

    echo "<section>";
   echo"<h1>Thank You.</h1>";
   echo "<p>Thank you for registering as a customer, your user account has been created!!.</p>";
   echo"</section>";

    header('Refresh: 2; URL = login.php');

}
    
?>