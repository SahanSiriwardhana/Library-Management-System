<?php
$cat_id= $_REQUEST['id'];

include('db_con.php');

$query=mysqli_query($con,"DELETE FROM book_category WHERE cate_id='".$cat_id."';");
			
			

?>