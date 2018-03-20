 <?php
include('db_con.php');
                    
						$usertype = $_POST['userType'];
                        //echo $_POST['bookID'];
                        $uid = $_POST['uid'];
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $email = $_POST['email'];
                        $TelNum = $_POST['TelNum'];
                       // $address = $_POST['address'];
                        
					//Quary
					$quary='';
					if($usertype=='Lec'){
				$quary="UPDATE `lecture` SET `fName` = '{$fname}', `lName` = '{$lname}', `telephone` = '{$TelNum}', `emali` = '{$email}' WHERE `lecture`.`lec_id` = '{$uid}';";
		
				
						
			}elseif($usertype=='Std'){
					$quary="UPDATE `student` SET `fName` = '".$fname."', `lName` = '".$lname."', `telephone` = '".$TelNum."', `emali` = '".$email."' WHERE `student`.`st_id` = '".$uid."' ";
					
					
						
			}else{
					$quary="UPDATE `user` SET `lName` = '".$lname."', `fName` = '".$fname."', `telephone` = '".$TelNum."', `emali` = '".$email."' WHERE `user`.`emp_id` = '".$uid."' ";	
						
						
						}
                          

                            if (mysqli_query($con, $quary) && $quary!='') {
                                echo "<div id='myModal1' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header bg-success text-white'>
        
        
		<h4 class='modal-title'>Sussess...</h4>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Profle has been updated</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div> <script> $(document).ready(function () {
                // Show the Modal on load
                $('#myModal1').modal('show');
});</script>";
                            } else {
                                echo "<div id='myModal1' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header bg-danger text-white'>
        
        <h4 class='modal-title'>Error...</h4>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Profile update is un-sucessfully</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div> <script> $(document).ready(function () {
                // Show the Modal on load
                $('#myModal1').modal('show');
});</script>";
                            }
                       
                    
                    ?>