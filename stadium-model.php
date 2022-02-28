<?php


//connect to database
function getConnection(){
	try{
	       $conn = new PDO('mysql:host=localhost;dbname=StadiumSeats', 'root', '');
	       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch (PDOException $exception)
	{
		echo "Oh no, there was a problem" . $exception->getMessage();
	}
	return $conn;
}

//close database connection
function closeConnection($conn)
{
	$conn=null;
}

//get all games
function getAllGames()
{
$conn = getConnection();
$query = "SELECT * FROM games";
$resultset = $conn->query($query);
$games = $resultset->fetchAll();
closeConnection($conn);
return $games;

}



//get games by id
function getGamesById($Game_ID)

{
	$conn = getConnection();
	$stmt = $conn->prepare ("SELECT * FROM games Where games.Game_ID = :id");
	$stmt->bindValue(':id',$Game_ID,);
	$stmt->execute();
	$game=$stmt->fetch();
	closeConnection($conn);
	return $game;

}

//get team by id
function getTeamsById($Team_ID)
{
    $conn = getConnection();
    $stmt =  $conn->prepare ("SELECT * FROM teams WHERE teams.Team_ID = :id");
    $stmt->bindValue(':id',$Team_ID,);
    $stmt->execute();
    $team=$stmt->fetch();
    closeConnection($conn);
    return $team;
}


//sanitize user entry
function sanitizeString($string)
{
  $string = strip_tags($string);

  $string = str_replace(" ","",$string);

  return $string;
}


//get all customers
function getAllCustomers()
{
	$conn = getConnection();
	$query = "SELECT * FROM customers";
$resultset = $conn->query($query);
$customers = $resultset->fetchAll();
	closeConnection($conn);
	return $customers;
}


//get all seats
function getAllSeats()
{
    $conn = getConnection();
    $query = "SELECT * FROM seats";
    $resultset = $conn->query($query);
    $seats = $resultset->fetchAll();
    closeConnection($conn);
    return $seats;
}


//get all teams
function getAllTeams()
{
	$conn = getConnection();
	$query = "SELECT * FROM teams";
	$resultset = $conn->query($query);
	$teams = $resultset->fetchAll();
	closeConnection($conn);
	return $teams;
}

//get all transactions by
function getAllTransactions()
{
    $conn = getConnection();
    $query = "SELECT * FROM transactions";
    $resultset = $conn->query($query);
    $transactions = $resultset->fetchAll();
    closeConnection($conn);
    return $transactions;
}

//get team by id
function getTransactionsById($Transaction_ID)
{
    $conn = getConnection();
    $stmt =  $conn->prepare ("SELECT * FROM transactions WHERE transaction.Transaction_ID = :id");
    $stmt->bindValue(':id',$Transaction_ID,);
    $stmt->execute();
    $transaction=$stmt->fetch();
    closeConnection($conn);
    return $transaction;
}

//get seat by id

function getSeatsById($Seat_Zone)
{
    $conn = getConnection();
    $stmt =  $conn->prepare ("SELECT * FROM seats WHERE seats.Seat_Zone = :id");
    $stmt->bindValue(':id',$Seat_Zone,);
    $stmt->execute();
    $seat=$stmt->fetch();
    closeConnection($conn);
    return $seat;
}


////search
//function search()
//{
//    $conn = getConnection();
//    $searchTerm = $_POST['find'];
//    $stmt = $conn->prepare("SELECT * FROM customers  WHERE customers.Name LIKE :searchTerm");
//    $stmt->bindValue(":searchTerm","%{$searchTerm}%");
//    $stmt->execute();
//    $customers = $stmt->fetchAll();
//    closeConnection($conn);
//    return $customers;
//}




// function getStyles($styleId)
//
// {
// $conn = getConnection();
// $stmt = $conn->prepare("SELECT * FROM hotels
// INNER JOIN styles on hotels.style_id = styles.id
// WHERE styles.id = :id");
// $stmt->bindValue(':id',$styleId);
// $stmt->execute();
// $hotels=$stmt->fetchAll();
// closeConnection($conn);
// return $hotels;
//
// }
