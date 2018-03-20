 <?php 
 include("db_con.php");
										
												$day=$_POST['day'];
												$book=$_POST['book'];
												$fine=$_POST['fine'];
												
													if($day!="" && $book!="" && $fine!="" ){
												//$memType=$_POST['memType'];
												//$len_cat=$_POST['len_cat'];
												$cirId2=$_POST['cirId2'];
												$quary="UPDATE `circulation_settings` SET `issue_day` = '".$day."', `issue_book` = '".$book."', `fine_per_day` = '".$fine."' WHERE `circulation_settings`.`Circulation_id` = ".$cirId2."  ";
												
												if(mysqli_query($con,$quary)){
													
													//header("Faculty.php");
													echo '<p style="color:blue">Updated Successfully ,Click close button</p>';
													}else{
														echo '<p style="color:red">Error</p>';
														}
													}else{
														echo '<p style="color:red">Input fields are empty.</p>';
														}
												
												?>