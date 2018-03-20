 <?php 
 include("db_con.php");
										
												$deg_name2=$_POST['degNameUpdate'];
												$fac_id2=$_POST['facualtyUp'];
												if($deg_name2!=""){
													if($fac_id2!=""){
												$deg_id=$_POST['degId2'];
												$quary="UPDATE `degree` SET `deg_name` = '".$deg_name2."', `fac_id` = '".$fac_id2."' WHERE `degree`.`deg_id` = ".$deg_id." ";
												
												if(mysqli_query($con,$quary)){
													
													//header("Faculty.php");
													echo '<p style="color:blue">Updated Successfully ,Click close button</p>';
													}else{
														echo '<p style="color:red">Error</p>';
														}
													}else{
														echo '<p style="color:red">Select a Faculty.</p>';
														}
												}else{
													echo '<p style="color:red">Input field is empty.</p>';
													}
												?>