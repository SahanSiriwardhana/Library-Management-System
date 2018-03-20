<?php
$fac_id= $_REQUEST['id'];

include('db_con.php');

$query=mysqli_query($con,"DELETE FROM faculty WHERE fac_id='".$fac_id."';");
			
			

?>