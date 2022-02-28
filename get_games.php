<?php
require 'header.php';
require 'nav.php';
?>


<?php
try{
    $conn = new PDO('mysql:host=localhost;dbname=stadium', 'root', '');
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception)
{
    echo "Oh no, there was a problem" . $exception->getMessage();
}

$query = $conn->prepare("SELECT * FROM games");
$resultset = $conn->query($query);
$games = $resultset->fetchAll();
$conn=NULL;


$child = "#fd7e14";
$border = "border: 2px solid #000000;";
$padding = "8px";
$backColor = "#3498db";
$color = "#000000;"


?>


<h1>Upcoming Games</h1>

<?php
echo "<table>";
echo "<tr><th>book_id</th><th>title</th><th>isbn</th><th>published_date</th><th>publisher_id</th><tr>";
foreach ($games as $game)
{
    echo "<tr>";
    echo "<td>{$game['Game_ID']}</td>";
    echo "<td>{$game['Team_1']}</td>";
    echo "<td>{$game['Team_2']}</td>";
    echo "<td>{$game['Game_Type']}</td>";
    echo "<td>{$game['Game_Date']}</td>";
    echo "</tr>";
}

echo "</table>";
?>
