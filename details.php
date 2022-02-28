<?php

include "stadium-model.php";
$Game_ID = $_GET['id'];
$Seat_Zone = $_GET['id'];
$game = getGamesById($Game_ID);
$seat = getSeatsById($Seat_Zone);
include "details-view2.php";
 ?>

