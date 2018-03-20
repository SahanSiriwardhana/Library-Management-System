<?php 
include('db_con.php');

	
		
	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
	}

	$facName=test_input($_POST['facName']);
	
	if($facName!=""){
	
	$quary1="SELECT * FROM `faculty` WHERE `fac_name` = '".$facName."'";
	$result=mysqli_query($con,$quary1);
	$numRows=mysqli_num_rows($result);
	if($numRows==0){
	$quary="INSERT INTO `faculty` (`fac_id`, `fac_name`) VALUES (NULL, '".$facName."');";
	if(mysqli_query($con,$quary)){
		
		echo '<p style="color:blue">Faculty has been added to Database</p>';

		}
		else{
			echo '<p style="color:red">Faculty was not added to the Database</p>';
			
			}
			}else{
				echo '<p style="color:red">This faculty is alredy exist</p>';
				}
	}else{
		echo '<p  style="color:red">Input field is empty</p ';
		}
	
	


?>