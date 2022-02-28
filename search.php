<?php
include "stadium-model.php";
extract($_POST);
//?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stadium Seats | Book Game</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">


</head>
<body style="background: url('images/stadium.jpg') center center no-repeat;background-size:cover; background-attachment: fixed;">

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <h3>Stadium <span class="first-letter">S</span>eats</h3>
        </div>
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="/Stadium-Seats/viewGames.php">View Games
                    <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
                </a>
            </li>
            <li class="active">
                <a href="/Stadium-Seats/viewTeams.php">View Teams
                    <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php"><span class="glyphicon glyphicon-backward"></span> Back To Home</a></li>
        </ul>
        <form action="search.php" id="search-form" method="post" onsubmit="myFunction()">
            <input id="search-box" class ="top-search" type="text" required placeholder="Customer Search.." name="find">
            <button type="submit" id = "go-btn"class ="animate__animated animate__bounce">Go</button>
        </form>
    </div>

</nav>



            <?php



      $searchTerm = $_POST['find'];
      $conn = getConnection();
            $stmt = $conn->prepare("SELECT * FROM `teams` WHERE `Team_Name` LIKE :searchTerm");
            $stmt->bindValue(":searchTerm","%{$searchTerm}%");
            $stmt->execute();
            $conn=null;
            $teams = $stmt->fetchAll();
            

            $child= "#fd7e14";
            $border= "border: 2px solid #000000;";
            $padding= "8px";
            $backColor= "#3498db";
            $color= "#000000;"


            ?>
            <style>
                <?php include 'searchupdate.css'; ?>

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

<div class="container-fluid">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>
                    <center>TEAMS INFORMATION</center>
                </h2>
                <div class="container-fluid">
                    <form class="form-horizontal" role="form" id="form-acc">
                        <table id="myTable-party" class="table table-bordered table-hover" cellspacing="0" width="100%">

                            <tbody>



           <?php

  echo "<table>";
  echo "<tr></tr><th>Team Id</th><th>Team Name</th><th>Team League</th></tr>";
  if ($teams) {
      foreach ($teams as $team) {
          echo "<p>";
          echo "<a href='details.php?id={$team['Team_ID']}'>";
          echo "</p>";


          echo "<tr>";
          echo "<a href='details.php?id={$team['Team_ID']}'>";
          echo "</a>";
          echo "<td>{$team['Team_ID']}</td>";
          echo "<td>{$team['Team_Name']}</td>";
          echo "<td>{$team['Team_League']}</td>";
          echo "</tr>";
      }
  
  }else {
      echo "<p> </p>";
  }

  echo "</table>";
?>

                            <tbody>




                            <tr>

                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>

</body>
</html>

