 <?php 
 include("db_con.php");
										
			$book_name=$_POST['book_title'];
			$author=$_POST['author'];
			$user=$_POST['userid'];
			
		$quary="INSERT INTO `user_requsted_book` (`requset_id`, `book_title`, `author`, `requsested_user_id`, `date`) VALUES (NULL, '".$book_name."', '".$author."', '".$user."', CURDATE());";	
		if($book_name!=""){
		if(mysqli_query($con,$quary)){
			echo "<div id='myModal1' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header bg-success text-white'>
        
        
		<h4 class='modal-title'>Sussess...</h4>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>
      <div class='modal-body'>
        <p>Request Completed</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-success' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div> <script>$(document).ready(function () {
                // Show the Modal on load
                $('#myModal1').modal('show');


            });
    </script>";
			}else{
				
				echo 'error';
				}
		}else{
			
			echo "<p style='color:red'>Please Enter the Book Title";
			}
?>
