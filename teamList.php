<?php
$title = "List Of All Teams";
include "stadium-model.php";
$games = getAllGames();


$child= "#fd7e14";
$border= "border: 2px solid #000000;";
$padding= "8px";
$backColor= "#3498db";
$color= "#000000";
?>

<style>
    td, th{
        border:<?php echo $border ?>;
        padding:<?php echo $padding ?>;
    }

    th{
        background-color:<?php echo $backColor ?>;
        color<?php echo $color ?>;
    }
    tr:nth-child(even){
        background-color:<?php echo $child ?>;
    }
</style>



<?php

echo "<table>";
echo "<tr><th>VIEW TEAM</th><th>LEAGUE</th></tr>";

$teams = getAllTeams();
foreach ($teams as $team) {

    echo "<tr>";
    echo '<td><a href="teamDetails.php?id='.$team['Team_ID'].'">'. $team['Team_Name'] .'</a></td>';
    echo "<td>{$team['Team_League']}</td>";
    echo "</tr>";

}
echo "</table>";
?>
<section>
    <h1>Filter Games Customers Booked </h1>
</section>


<?php
foreach($games as $game){
    echo "<label for='{$game["Game_ID"]}'>";
    echo "<input type='radio' name='games' class='gamesBtn' value='{$game["Game_ID"]}' id='{$game["Game_ID"]}'>";
    echo "{$game["Game_ID"]}";
    echo "</label>";
}
?>
<div id="matching-teams">
    matching customers will be displayed on here
</div>
<script src="games-ajax.js"></script>
</body>
</html>
