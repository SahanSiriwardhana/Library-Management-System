 <?php
//var_dump($_FILES);
include('db_con.php');
                    

                        //echo $_POST['bookID'];
                        $lid = $_POST['lecid'];
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $email = $_POST['email'];
                        $TelNum = $_POST['TelNum'];
                        $address = $_POST['address'];
                        $faulty = $_POST['faulty'];
                        //$lendNum=test_input($_POST['lendNum']);
                        $image = "defult.png";
					//Quary
                            $queary = "UPDATE `lecture` SET `address` = '{$address}', `fName` = '{$fname}', `lName` = '{$lname}', `telephone` = '{$TelNum}', `faculty` = '{$faulty}', `emali` = '{$email}' WHERE `lecture`.`lec_id` = '{$lid}';";

                            if (mysqli_query($con, $queary)) {
                                echo "<div id='myModal1' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header bg-success text-white'>
        
        
		<h4 class='modal-title'>Sussess...</h4>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Lecture Edit Successfull</p>
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
        <p>Lecture is not added to the Database</p>
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