<?php 
include('db_con.php');
$userid=$_POST['userid'];
$currentPassword=md5($_POST['currentPassword']);
$newPassword=$_POST['newPassword'];
$confirm=$_POST['confirm'];

	$quary="SELECT * FROM `user_acount` WHERE `id` = '".$userid."' AND password='".$currentPassword."'";
	$numrows=mysqli_num_rows(mysqli_query($con,$quary));
	if($numrows>0){
		if($newPassword==$confirm){
			
			$newPassword=md5($newPassword);
			$quary2="UPDATE `user_acount` SET `password` = '".$newPassword."' WHERE `user_acount`.`id` = '".$userid."' ";
			if(mysqli_query($con,$quary2)){
				
				echo '<div class="w3-panel w3-green w3-display-container">
  <span onclick="this.parentElement.style.display=\'none\'"
  class="w3-button w3-green w3-large w3-display-topright">&times;</span>
  <h3>Success!</h3>
  <p>Password has been changed</p>
</div>';
				}else{
					 echo '<div class="w3-panel w3-red w3-display-container w3-padding">
  <span onclick="this.parentElement.style.display=\'none\'"
  class="w3-button w3-red w3-large w3-display-topright">&times;</span>
  <h3> Warning !</h3>
  <strong>Update unsuccessfull..!
</div>';
					
					
					}
			
			}else{
				
				 echo '<div class="w3-panel w3-red w3-display-container w3-padding">
  <span onclick="this.parentElement.style.display=\'none\'"
  class="w3-button w3-red w3-large w3-display-topright">&times;</span>
  <h3> Warning !</h3>
  <strong>New Password &amp; Confirm Password </strong> did not match..!
</div>';
				}
		
		}else{
			 echo '<div class="w3-panel w3-red w3-display-container w3-padding">
  <span onclick="this.parentElement.style.display=\'none\'"
  class="w3-button w3-red w3-large w3-display-topright">&times;</span>
  <h3> Warning !</h3>
  <strong>User </strong> does not exist..!
</div>';
			}

?>