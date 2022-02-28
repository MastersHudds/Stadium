<?php

include "stadium-model.php";
$teams = $_GET['id'];
$team = getTeamsById($teams);
include "teamsView.php";
?>
