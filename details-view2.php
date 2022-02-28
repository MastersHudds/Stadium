<?php
include "secondary-header.php";

?>


<div class="container-fluid">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>
                    <center>BUY A TICKET</center>
                </h2>
                <div class="container-fluid">
                    <form class="form-horizontal" action="process-booking.php"  method="post" id="form-acc">

                        <table id="myTable-party" class="table table-bordered table-hover" cellspacing="0" width="100%">

                            <tbody>

                            <tr>
                                <td>
                                    <strong>GAME ID:</strong><?= $game['Game_ID']; ?>
                                    <input type="hidden" name = "game" value="<?= $game['Game_ID']; ?>"/>
                                </td>
                                <td>
                                    <strong>GAME TYPE:</strong><?= $game['Game_Type']; ?>
                                </td>
                                <td>
                                    <strong>FIRST TEAM:</strong><?= $game['Team_1']; ?>
                                </td>
                                <td>
                                    <strong>SECOND TEAM:</strong><?= $game['Team_2']; ?>
                                </td>
                                <td>
                                    <strong>MATCH DATE:</strong><?= $game['Game_Date']; ?>
                                    <input type="hidden"  name = "date" value="<?= $game['Game_Date']; ?>"/>
                                    <input type="hidden" name="amount" id="hm" value="<?= $game['Price'];?>"/>
                                </td>
                                </td>

                                <td>
                                    <h4>Number of seats</h4>  <input type="number" required tile="Number of Seats"  name="seats" class="form-control" value="1" style="text-align:center" id="seats"/>
                                </td>
                            </tr>

                            </tbody>


                        </table>

                        <table>
                            <tr>
                                <td>
                                    <strong>Total Amount</strong>

                                <td id="amount" style="font-weight:bold;font-size:18px">
                                   £<?php echo $game['Price'];?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label class="control-label">Name on Card</label>
                                    <input type="text" class="form-control" name="name">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="control-label">Customer No</label>
                                    <input type="text" class="form-control" name="customerNo">
                                </td>
                            </tr>
                                <td>
                                    <label class="control-label">Card Number</label>
                                    <input type="text" class="form-control" name="number" required title="Enter 16 digit card number">

                                </td>
                            </tr>
                                <td>
                                    <label class="control-label">Expiration date</label>
                                    <input type="date" class="form-control" name="cardDate">
                                    </td>
                            </tr>
                                <td>
                                    <label class="control-label">CVV</label>
                                    <input type="text" class="form-control" name="cvv">
                                    </td>
                            </tr>
                        </table>


                        <button type="submit" name = "bookBtn" class="btn btn-success">Book
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                        </button>
                        </a>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>

<script type="text/javascript">
    $('#seats').change(function(){
        var Price=<?php echo $game['Price'];?>//;
        amount=Price*$(this).val();
        $('#amount').html("£ "+amount);
        $('#hm').val(amount);
    });
</script>

