
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
                        <a href="admin/index.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
        <form action="search.php" id="search-form" method="post" onsubmit="myFunction()">
        <input id="search-box" class ="top-search" type="text" required placeholder="Customer Search.." name="find">
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
                <a href="admin/index.php">Login</a>
            </li>
        </ul>

    </div>
</aside>

<script>
    function myFunction() {
        if($('#search-form').val()=="")
        {
            alert("Please enter a concert name...");//empty searchBar field
        }
    }
</script>