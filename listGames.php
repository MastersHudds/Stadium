<?php
require_once "auth.php";
include "stadium-model.php";
$teams = getAllTeams();
$games = getAllGames();
$seats = getAllSeats();
include "list-view.php";

?>
