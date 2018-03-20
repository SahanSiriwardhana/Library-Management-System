<?php
$empId= $_REQUEST['id'];

include('db_con.php');

$query=mysqli_query($con,"DELETE FROM `user` WHERE `user`.`emp_id` = '".$empId."';");
$query2=mysqli_query($con,"DELETE FROM `user_acount` WHERE `user_acount`.`id` = '".$empId."';");			
			

?>