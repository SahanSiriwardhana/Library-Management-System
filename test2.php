<?php
include('config/db_con.php');





$id = $_GET['id'];

$sel_query = mysqli_query($con, "SELECT * FROM `faculty` WHERE `fac_id` ='" . $_GET['id'] . "'") or die(mysql_error($conn));
$selrow = mysqli_fetch_array($sel_query, MYSQLI_ASSOC);
?>




<input class="w3-input w3-border " name="FacNameUpdate" type="text" placeholder="Category Name" id="CatName"  value="<?php echo $selrow['fac_name'] ?>">
<input type="hidden" name="FacID2" id="CatId" value="<?php echo $selrow['fac_id'] ?>">













