<?php 
include('db_con.php');

	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
	}

	$catName=test_input($_POST['CatName']);
	
	if($catName!=""){
	$quary1="SELECT * FROM `book_category` WHERE `cate_name` = '".$catName."'";
	$result=mysqli_query($con,$quary1);
	$numRows=mysqli_num_rows($result);
	if($numRows==0){
	
	$quary="INSERT INTO `book_category` (`cate_id`, `cate_name`) VALUES (NULL, '".$catName."');";
	if(mysqli_query($con,$quary)){
		
		echo '<p style="color:blue">Book Category has been added to Database</p>';
		}
		else{
			
			echo '<p style="color:red">Book was not added to Database</p>';
			}
	}else{
		echo '<p style="color:red">This book category is alredy exist</p>';
		
		}
	
	}
	
	else{
		echo '<p style="color:red">Input filed is empty</p>';
		}
?>