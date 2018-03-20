<?php
$book_id= $_REQUEST['id'];

include('db_con.php');

$query=mysqli_query($con,"DELETE FROM book WHERE book_id='".$book_id."';");
			
			

?>