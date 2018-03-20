<?php
$issue_id= $_REQUEST['id'];

include('db_con.php');
$returnDate=date('Y-m-d');

$query1=mysqli_query($con,"UPDATE `issue_details` SET `is_returned` = 'Yes',`returned_date` = '".$returnDate."' WHERE `issue_details`.`issue_id` = ".$issue_id." ");
$query3=mysqli_query($con,"SELECT * FROM `issue_details` WHERE `issue_id` = ".$issue_id."");
$result=mysqli_fetch_array($query3);
$book_id=$result['book_id'];

$query2=mysqli_query($con,"UPDATE `book` SET `availability` = 'Available' WHERE `book`.`book_id` = '".$book_id."' ");
	if($query1 && $query2){		
  echo "<div id='myModal1' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header bg-success text-white'>
        
        
		<h4 class='modal-title'>Sussess...</h4>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Return has been completed</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div><script>$(document).ready(function () {
                // Show the Modal on load
                $('#myModal1').modal('show');


            });</script> ";
	}else{
		echo "<div id='myModal1' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header bg-danger text-white'>
        
        <h4 class='modal-title'>Error...</h4>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Error occur in return process</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div><script>$(document).ready(function () {
                // Show the Modal on load
                $('#myModal1').modal('show');


            });</script>";
                            
		}
?>