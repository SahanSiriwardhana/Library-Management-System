 <?php 
include('db_con.php');
//var_dump($_FILES);

		
	//echo $_POST['bookID'];
	$stdID=$_POST['stdID'];
	$Fname=$_POST['Fname'];
	$lname= $_POST['lname'];
	$email=$_POST['email'];
	$telephone=$_POST['telephone'];
	$address=$_POST['address'];
	$fac=$_POST['fac'];
    $deg=$_POST['deg'];
	//$lendNum=test_input($_POST['lendNum']);
	 $image ="defult.png";
	




		
		
		//Quary
		$queary="UPDATE `student` SET `fName` = '".$Fname."', `lName` = '".$lname."', `telephone` = '".$telephone."', `address` = '".$address."', `faculty` = '".$fac."', `degree` = '".$deg."', `emali` = '".$email."' WHERE `student`.`st_id` = '".$stdID."' ";
	
	if(mysqli_query($con,$queary)){
		echo "<div id='myModal1' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header bg-success text-white'>
        
        
		<h4 class='modal-title'>Sussess</h4>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Student has been updated.</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div> <script>$(document).ready(function(){
    // Show the Modal on load
    $('#myModal1').modal('show');
    });</script>";
		} 
		
		else{
			echo "<div id='myModal1' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header bg-danger text-white'>
        
        <h4 class='modal-title'>Error</h4>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Unsuccessfull</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div> <script>$(document).ready(function(){
    // Show the Modal on load
    $('#myModal1').modal('show');
    });</script>";
			}
		


?>