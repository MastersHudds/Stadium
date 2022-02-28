<?php
require_once "auth.php";
$title = "Stadium Seats | Bookings"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Stadium Seats Booking" />
    <meta name="keywords" content="Stadium Seats| Ticket Booking| Football seats|Stadium seats booking" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
</head>

<body style="background: url('images/stadium.jpg') center center no-repeat;background-size:cover; background-attachment: fixed;">
<nav class="navbar" id="navbar">
    <div class="navbar1">
        <div class="nav-center">
            <div class="nav-header">
                <div class="logo">Stadium<span class="first-letter">Seats</span></div>
                <button class="bars" id="nav-btn">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="nav-menu">
                <ul>
                    <li class="active">
                        <a href="index.php#home">Home</a>
                    </li>
                    <li>
                        <a href="viewGames.php">Games</a>
                    </li>
                    <li>
                        <a href="viewTeams.php">Teams</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <form action="search.php" id="search-form" method="post" onsubmit="myFunction()">
            <input id="search-box" class ="top-search" type="text" required placeholder="Search Teams.." name="find">
            <button type="submit" id = "go-btn"class ="animate__animated animate__bounce">Go</button>
        </form>
    </div>
</nav>
<aside class="sidebar" id="sidebar">
    <div>
        <button id="close-btn" class="close-btn">
            <i class="fa fa-times"></i>
        </button>
        <ul class="sidebar-links">
            <li>
                <a href="index.php#home">Home</a>
            </li>
            <li>
                <a href="viewGames.php">Games</a>
            </li>
            <li>
                <a href="viewTeams.php">Teams</a>
            </li>
            <li>
                <a href="login.php">Login</a>
            </li>
            <li>
                <a href="logout.php">Logout</a>
            </li>
        </ul>

    </div>
</aside>

