<?php
include('config/db_con.php');





$id = $_GET['id'];

$sel_query = mysqli_query($con, "SELECT * FROM `book_category` WHERE cate_id='" . $_GET['id'] . "'") or die(mysql_error($conn));
$selrow = mysqli_fetch_array($sel_query, MYSQLI_ASSOC);
?>




<input class="w3-input w3-border " name="CatNameUpdate" type="text" placeholder="Category Name" id="CatName"  value="<?php echo $selrow['cate_name'] ?>">
<input type="hidden" name="CatId2" id="CatId" value="<?php echo $selrow['cate_id'] ?>">













