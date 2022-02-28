<?php
$title = "List Of All Games";


$child= "#fd7e14";
$border= "border: 2px solid #000000;";
$padding= "8px";
$backColor= "#3498db";
$color= "#000000";
?>

<style>
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

</section>


 <?php

 echo "<table>";
 echo "<tr><th>VIEW GAME</th><th>DATE</th><th>PRICE</th></tr>";

   foreach ($games as $game) {

 echo "<tr>";
 echo '<td><a href="details.php?id='.$game['Game_ID'].'">'. $game['Game_Type'] .' </a></td>';
 echo "<td>{$game['Game_Date']}</td>";
 echo "<td> £{$game['Price']}</td>";
 echo "</tr>";

 }
 echo "</table>";
?>
<section>
  <h1>Filter Customers </h1>
</section>


<?php
$transactions = getAllTransactions();


foreach($transactions as $transaction){
	echo "<label for='{$transaction["Transaction_ID"]}'>";
  echo "<input type='radio' name='teams' class='transactionBtn' value='{$transaction["Transaction_ID"]}' id='{$transaction["Transaction_ID"]}'>";
  echo "{$transaction["Transaction_ID"]}";
  echo "</label>";
}
?>
<div id="matching-customers">
<!-- matching games will be displayed in here -->
</div>
<script src="stadium-ajax.js"></script>
