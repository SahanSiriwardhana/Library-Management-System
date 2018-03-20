<?php 

include("db_con.php");
	$bookid=$_POST['bookid'];
	$memberType=$_POST['memberType'];
	$memberId=$_POST['memberID'];
	//$booktype=$_POST['bookType'];
	$queary_bookType=mysqli_query($con,"SELECT * FROM `book` WHERE `book_id` = '".$bookid."' AND availability='Available'");
	$numRow1=mysqli_num_rows($queary_bookType);
	
	if($numRow1!=0){
	$selrow=mysqli_fetch_array($queary_bookType,MYSQLI_ASSOC);
	$booktype=$selrow['book_type'];//Book type of selected book
	$title=$selrow['title'];
	$queary="SELECT * FROM `user_acount` WHERE `id` = '".$memberId."' AND `user_type` = '".$memberType."'";
	$result=mysqli_query($con,$queary);	
	$row=mysqli_num_rows($result);
	
	if($row!=0){//Check user is valide or not ,
		$resul=mysqli_query($con,"SELECT * FROM `circulation_settings` WHERE `member_type` = '".$memberType."' AND `lending_cat` = '".$booktype."'");
		$result2=mysqli_fetch_array($resul);
		$no_of_day_can_issue=$result2['issue_day'];
		$no_of_book_can_issue=$result2['issue_book'];
		$fine_per_day=$result2['fine_per_day'];
		
		$result3=mysqli_query($con,"SELECT * FROM `issue_details` WHERE `user_id`='".$memberId."' AND `is_returned`='No';");
		$numRow=mysqli_num_rows($result3);
		
		if($numRow==$no_of_book_can_issue){
			//Check this user is allready borrowed and not returned books amount of he or she can
			
			echo "<div class='w3-card-4 w3-col  w3-padding w3-margin-left'><div class='w3-panel w3-red w3-display-container' style='margin-left:1%'>
  <span onclick='this.parentElement.style.display=\"none\"'
  class='w3-button w3-red w3-large w3-display-topright'>&times;</span>
  <h3>Danger!</h3>
  <p>This member can't Borrow more books. Please return privious book .</p>
</div></div>";
			}else{
				$issudeDate=date('Y-m-d');
				//$oldDate = date('Y-m-d');
				$addedDays = $no_of_day_can_issue;
				$newDate = date('Y-m-d', strtotime($issudeDate. " + {$addedDays} days"));

				//$returnDeadline=date('Y-m-d' , strtotime('$no_of_day_can_issue days'));
				$queary2="INSERT INTO `issue_details` (`issue_id`, `book_id`, `user_id`, `issued_date`, `return_dedline`, `returned_date`, `is_returned`, `fine`, `fine_per_day`) VALUES (NULL, '".$bookid."', '".$memberId."', '".$issudeDate."', '".$newDate."', '', 'No', '', '".$fine_per_day."');";
				$queary3="UPDATE `book` SET `availability` = 'Not Available' WHERE `book`.`book_id` = '".$bookid."' ";
				
				if(mysqli_query($con,$queary2) && mysqli_query($con,$queary3)){
					
					//echo "Issue Completed";
					
					?>
					
					<div class="w3-card-4 w3-col  w3-padding w3-margin-left" style="padding-left:1%">
                    <div class="w3-panel w3-green w3-display-container" >
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-green w3-large w3-display-topright">&times;</span>
  <h3>Success!</h3>
  <p>Book has been issued completed.</p>
</div>
            	  <table class="table table-striped table-bordered" id="example" >
                            <thead>
                                <tr class="w3-light-grey">
                                    <th width="15%">Book ID</th>
                                    <th width="15%">Member ID</th>
                                    <th>Title</th>
                                    <th width="20%">Issued Date</th>
									<th width="20%">Return Deadline</th>
                                </tr>
                            </thead>
                             
                             <tr class="w3-white">
                                    <td width="15%"><?php echo $bookid ?></td>
                                    <td width="15%"><?php echo $memberId ?></td>
                                    <td><?php echo $title ?></td>
                                    <td width="20%"><?php echo $issudeDate ?></td>
									<td width="20%"><?php echo $newDate ?></td>
                                </tr>
                            
                          
                  </table>
                  
            	</div>
					
					<?php
					}else{
						echo "<div class='w3-card-4 w3-col  w3-padding w3-margin-left'><div class='w3-panel w3-red w3-display-container' style='margin-left:2%'>
  <span onclick='this.parentElement.style.display='none''
  class='w3-button w3-red w3-large w3-display-topright'>&times;</span>
  <h3>Danger!</h3>
  <p>Book Issue not Completed.</p>
</div></div>";
						
						}
				
				}
		
		}else{
			echo "<div class='w3-card-4 w3-col  w3-padding w3-margin-left'><div class='w3-panel w3-red w3-display-container' style='margin-left:2%'>
  <span onclick='this.parentElement.style.display='none''
  class='w3-button w3-red w3-large w3-display-topright'>&times;</span>
  <h3>Danger!</h3>
  <p>Member ID does not matched with member type or invalide.</p>
</div></div>";
			
			}
	}else{
		
		echo "<div class='w3-card-4 w3-col  w3-padding w3-margin-left'><div class='w3-panel w3-red w3-display-container' style='margin-left:2%'>
  <span onclick='this.parentElement.style.display='none''
  class='w3-button w3-red w3-large w3-display-topright'>&times;</span>
  <h3>Danger!</h3>
  <p>This book is not available.</p>
</div></div>";
		
		}
?>