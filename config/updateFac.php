 <?php 
 include("db_con.php");
										
												$fac_name2=$_POST['FacNameUpdate'];
												if($fac_name2!=""){
												$fac_id=$_POST['FacID2'];
												$quary="UPDATE `faculty` SET `fac_name` = '".$fac_name2."' WHERE `faculty`.`fac_id` = ".$fac_id." ";
												
												if(mysqli_query($con,$quary)){
													
													//header("Faculty.php");
													echo '<p style="color:blue">Updated Successfully ,Refresh the page</p>';
													}else{
														echo '<p style="color:red">Error</p>';
														}
														
												}else{
													echo '<p style="color:red">Input field is empty.</p>';
													}
												?>