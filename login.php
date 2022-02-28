<!DOCTYPE HTML>
<html>
<head>
    <title>Login in</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" href="style.css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="ccs/style.css" media="screen">
    <link rel="stylesheet" href="css/style1.css" media="screen">
    <link rel="stylesheet" href="/style.css" media="screen">

</head>
<body>

<div class="wrap">
    <div class="content-top" style="min-height:300px;padding:50px">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <?php include('login-alert.php');?>

                    <p class="login-box-msg">Sign in to use our services</p>
                    <form method = "post" action="login-process.php">

                        <div class="form-group has-feedback">
                            <input  type="text" name="email" id ="email" size="25" class="form-control" placeholder="Enter Email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <input name="password" type="password" id ="password" size="25" class="form-control" placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name = "login">Login</button>
                            <p class="login-box-msg" style="padding-top:20px">New Here? <a href="registration.php">Register</a></p>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>


</body>
</html>