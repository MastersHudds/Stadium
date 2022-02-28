<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=StadiumSeats', 'root', '');
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}
$Transaction_ID = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM transactions
INNER JOIN customers on customers.Customer_Number = transactions.Customer_Number
WHERE transactions.Transaction_ID = :id");
$stmt->bindValue(':id',$Transaction_ID);
$stmt->execute();
$transactions=$stmt->fetchAll();
$conn=NULL;
echo json_encode($transactions);

?>
