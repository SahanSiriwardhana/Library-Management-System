<?php
$request_id= $_REQUEST['id'];

include('db_con.php');

$query=mysqli_query($con,"DELETE FROM `user_requsted_book` WHERE `user_requsted_book`.`requset_id` = ".$request_id."");
			
			

?>