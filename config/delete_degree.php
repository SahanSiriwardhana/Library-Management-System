<?php
$deg_id= $_REQUEST['id'];

include('db_con.php');

$query=mysqli_query($con,"DELETE FROM degree WHERE deg_id='".$deg_id."';");
			
			

?>