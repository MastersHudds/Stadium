<?php
include "secondary-header.php";

?>


<div class="container-fluid">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>
                    <center>SELECT GAME</center>
                </h2>
                <div class="container-fluid">
                    <form class="form-horizontal" role="form" id="form-acc">
                        <table id="myTable-party" class="table table-bordered table-hover" cellspacing="0" width="100%">

                            <tbody>
                            <?php require_once('listGames.php'); ?>
                            <tr>
                                <td>
                                    
                                </td>
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


<?php
include "footer.php";
?>

