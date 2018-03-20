<?php 
include('db_con.php');

	
		
	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
	}

	$degName=test_input($_POST['degree_name']);
	$facualty=test_input($_POST['facualty']);
	if($degName!="" ){
		if($facualty!=""){
	
	$quary1="SELECT * FROM `degree` WHERE `deg_name` = '".$degName."' AND `fac_id` = ".$facualty."";
	$result=mysqli_query($con,$quary1);
	$numRows=mysqli_num_rows($result);
	if($numRows==0){
	$quary="INSERT INTO `degree` (`deg_id`, `deg_name`, `fac_id`) VALUES (NULL, '".$degName."', '".$facualty."');";
	if(mysqli_query($con,$quary)){
		
		echo '<p style="color:blue">Degree has been added to Database</p>';

		}
		else{
			echo '<p style="color:red">Degree was not added to the Database</p>';
			
			}
			}else{
				echo '<p style="color:red">This degree is alredy exist</p>';
				}
		}else{
			echo '<p  style="color:red">Please select a Faculty</p ';
			}
	}
	
	else{
		echo '<p  style="color:red">Input field is empty</p ';
		}
	
	


?>