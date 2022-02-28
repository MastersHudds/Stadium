<?php

$title = "Log Out";
include "secondary-header.php";
session_destroy();
header('Refresh: 5; URL = login.php');

?>

<div class="container-fluid">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">

                <section>
                    <h1>Thank you, you are now logged out</h1>
                    <p>To access any pages again please log in.</p>
                </section>

            </div>
        </div>
    </div>
</div>
</div>