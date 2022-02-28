<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=StadiumSeats', 'root', '');
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}
$Team_ID = $_GET['id'];

$stmt = $conn->prepare("SELECT customers.Name, customers.Customer_Number from customers INNER JOIN transactions 
    ON customers.Customer_Number = transactions.Customer_Number INNER JOIN bookings ON bookings.Customer_Number 
= bookings.Transaction_ID WHERE bookings.Game_ID = :id");
$stmt->bindValue(':id',$Team_ID);
$stmt->execute();
$transactions=$stmt->fetchAll();
$conn=NULL;
echo json_encode($transactions);

?>
