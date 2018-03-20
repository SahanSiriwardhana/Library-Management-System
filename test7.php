<?php

include('config/db_con.php');

$book_id = $_GET['book_id'];
$user_id = $_GET['user_id'];
date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d');
$time = date('H:i:s');
$query2 = mysqli_query($con, "SELECT * FROM `reservation` WHERE `lecture_id` = '" . $user_id . "' ");
$numrow = mysqli_num_rows($query2);

if ($numrow == 2) {
    echo "<div id='myModal1' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header bg-danger text-white'>
        
        <h4 class='modal-title'>Sorry...</h4>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>You can reserve only 2 book</p>
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
} else {
    $query = "INSERT INTO `reservation` (`reserve_id`, `res_date`, `lecture_id`, `book_id`, `res_time`) VALUES (NULL, '" . $date . "', '" . $user_id . "', '" . $book_id . "', '" . $time . "');";

    $queary3 = "UPDATE `book` SET `availability` = 'Not Available' WHERE `book`.`book_id` = '" . $book_id . "' ";
//$selrow=mysqli_fetch_array($sel_query,MYSQLI_ASSOC);

    if (mysqli_query($con, $query) && mysqli_query($con, $queary3)) {

        echo "<div id='myModal1' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header bg-success text-white'>
        
        
		<h4 class='modal-title'>Sussess...</h4>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Reservation has been completed.</p><p style='color:red'>But resrvation will be cancel after two days</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div><script>$(document).ready(function () {
                // Show the Modal on load
                $('#myModal1').modal('show');
				$('#process').attr('disabled','disabled');

            });</script> ";
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
        <p>Error in reservation</p>
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
}
?>















