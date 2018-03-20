<?php 
include("db_con.php");
											
												$cat_name2=$_POST['CatNameUpdate'];
												if($cat_name2!=""){
												$cat_id=$_POST['CatId2'];
												$quary="UPDATE `book_category` SET `cate_name` = '".$cat_name2."' WHERE `book_category`.`cate_id` = ".$cat_id.";";
												
												if(mysqli_query($con,$quary)){
													
												//	header("Book_category.php");
													echo '<p style="color:blue">Updated Successfully ,Refresh the page</p>';
													}else{
														echo '<p style="color:red">Error</p>';
														}
												}else{
													echo '<p style="color:red">Input field is empty.</p>';
													}
												?>