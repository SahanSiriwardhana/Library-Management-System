<?php include('db_con.php');


	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	//echo $_POST['bookID'];
	$userid=test_input($_POST['userid']);
	$usertype=test_input($_POST['usertype']);
	
	$image=$_FILES["fileToUpload"]["name"];
	$image2 = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));

	try{
		if($usertype=='Std'){
		$queary="UPDATE `student` SET image='".$image2."' WHERE `student`.`st_id` = '".$userid."' ";
		}elseif($usertype=='Lec'){
			$queary="UPDATE `lecture` SET image='".$image2."' WHERE `lecture`.`lec_id` = '".$userid."' ";
			}else{
				$queary="UPDATE `user` SET image='".$image2."' WHERE `user`.`emp_id` = '".$userid."' ";
				
				}
	if(mysqli_query($con,$queary)){
		


		echo "<div id='myModal1' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header bg-success text-white'>
        
        
		<h4 class='modal-title'>Sussess...</h4>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Profile has been updated</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div>  <script type='text/javascript'>
          $(document).ready(function () {
                // Show the Modal on load
                $('#myModal1').modal('show');


            });</script>  ";
		} 
		
		else{
			echo "<div id='myModal1' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header bg-danger text-white'>
        
        <h4 class='modal-title'>Error...</h4>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Profile is not updated</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div>  <script type='text/javascript'>
          $(document).ready(function () {
                // Show the Modal on load
                $('#myModal1').modal('show');


            });</script>  ";
			}
	}catch(Exception $ex){
		echo $ex->getMessage();
		
		}
  





?>
