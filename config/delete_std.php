<?php
$std_id= $_REQUEST['id'];

include('db_con.php');

$query=mysqli_query($con,"DELETE FROM student WHERE st_id='".$std_id."';");
$query2=mysqli_query($con,"DELETE FROM `user_acount` WHERE `user_acount`.`id` = '".$std_id."';");	
			

?>