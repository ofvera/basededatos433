<!DOCTYPE html>

<?php
include('head.php');
 ?>

<?php

?>

<table><tr> <th>Banda</th> </tr>

<?php
foreach ($dataCollected as $p) {
  echo "<tr> <td>$p[0]</td> </tr>";
}
?>

</table>


<form action="index.php" method="post">
  <input type="submit" value="Volver">
</form>

<?php
include('final.php');
 ?>
