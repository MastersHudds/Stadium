<?php

$title = "View Game Details";
include "header.php";

?>

<section>
	<h1>Game Details</h1>
</section>


<?php
echo "<fieldset>";

if($game){
  echo "<h1>BUY A GAME TICKET</h1>";
  echo "<p>";
  echo "<strong>GAME ID:</strong> {$game['Game_ID']}<br>";
  echo "<strong>GAME TYPE:</strong> {$game['Game_Type']}<br>";
  echo "<strong>TEAM 1:</strong>  {$game['Team_1']}<br>";
  echo "<strong>TEAM 2:</strong>  {$game['Team_2']}<br>";
  echo "<strong>GAME DATE:</strong> {$game['Game_Date']}<br>";
  echo "<strong>PRICE:</strong> {$game['Price']}<br>";


  echo "</p";


echo "</fieldset>";
}else{
 	echo "<p> No games found </p>";
 }
?>

</body>
<footer>
  <?php
  include "footer.php";
   ?>
 </footer>
</html>
