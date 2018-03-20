<?php
$lec_id= $_REQUEST['id'];

include('db_con.php');

$query=mysqli_query($con,"DELETE FROM lecture WHERE lec_id='".$lec_id."';");
$query2=mysqli_query($con,"DELETE FROM `user_acount` WHERE `user_acount`.`id` = '".$lec_id."';");		
			

?>