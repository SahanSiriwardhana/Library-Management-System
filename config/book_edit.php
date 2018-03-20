<?php include('db_con.php');


	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	//echo $_POST['bookID'];
	$bookID=test_input($_POST['bookID']);
	$isbn=$_POST['isbn'];
	$title= test_input($_POST['title']);
	$category=test_input($_POST['cat']);
	
	$author=test_input($_POST['author']);
	$publisher=test_input($_POST['publisher']);
	$bookType=test_input($_POST['bookType']);
	$addedDate=test_input($_POST['datepicker']);
	//$image=$_FILES["fileToUpload"]["name"];
	//$image2 = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));
//echo $isbn;
	try{
		
		$queary3="UPDATE `book` SET `ISBN` = '".$isbn."', `title` = '".$title."', `category` = '".$category."',  `publisher` = '".$publisher."', `auther` = '".$author."', `added_date` = '".$addedDate."', `book_type` = '".$bookType."' WHERE `book`.`book_id` = '".$bookID."' ";
	$res=mysqli_query($con,$queary3);
	if($res){
		echo "<div id='myModal1' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header bg-success text-white'>
        
        
		<h4 class='modal-title'>Sussess...</h4>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Book has been edited</p>
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
        <p>Book is not edited.</p>
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