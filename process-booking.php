<?php
require_once "auth.php";
include('stadium-model.php');


$conn = getConnection();




if(isset($_POST["bookBtn"])) {
    $customerNo = $_POST['customerNo'];
    $amount = $_POST['amount'];
    $game_ID = $_POST['game'];
    $name = $_POST['name'];
    $date = date("Y/m/d");


    if ($customerNo == "" || $amount == "" || $game_ID == "" || $name == ""){
        return;

    }
//SQL INSERT for adding a new row
//Using a prepared statement to bind the values from the form to populate the transactions table
    $query = "INSERT INTO transactions ( Order_Date, Customer_number, Total_Price) VALUES
( :Order_Date, :customerNo, :amount)";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':Order_Date', $date);
    $stmt->bindValue(':customerNo', $customerNo);
    $stmt->bindValue(':amount', $amount);
    $stmt->execute();

    $newTransactionId = $conn->lastInsertId();

//Using a prepared statement to bind the values from the form to populate the bookings table
    $query = "INSERT INTO bookings ( Transaction_ID, Game_ID, Customer_Number) VALUES
( :Transaction_ID, :game_ID, :Customer_Number)";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':Transaction_ID', $newTransactionId);
    $stmt->bindValue(':game_ID', $game_ID);
    $stmt->bindValue(':Customer_Number', $customerNo);
    $stmt->execute();
    $conn = NULL;

    echo "<section>";
   echo"<h1>Thank You $name for your order.</h1>";
   echo"</section>";

    header('Refresh: 5; URL = index.php');

}
    
?>