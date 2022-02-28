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
                <a href="viewGames.php">View Games
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
                            <?php require_once('teamList.php'); ?>
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
