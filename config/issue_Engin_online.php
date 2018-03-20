<?php 

include("db_con.php");

$reserve_id=$_REQUEST['id'];
//$queary="SELECT * FROM `reservation` WHERE `reserve_id` = ".$reserve_id."";
$queary=mysqli_query($con,"SELECT * FROM `reservation` WHERE `reserve_id` = ".$reserve_id."");
$result=mysqli_fetch_array($queary);

$lec_id=$result['lecture_id'];
$book_id=$result['book_id'];

	$queary_bookType=mysqli_query($con,"SELECT * FROM `book` WHERE `book_id` = '".$book_id."'");
	$selrow=mysqli_fetch_array($queary_bookType,MYSQLI_ASSOC);
	$booktype=$selrow['book_type'];//Book type of selected book
	$title=$selrow['title'];
	
	$resul=mysqli_query($con,"SELECT * FROM `circulation_settings` WHERE `member_type` = 'Lec' AND `lending_cat` = '".$booktype."'");
		$result2=mysqli_fetch_array($resul);
		$no_of_day_can_issue=$result2['issue_day'];
		$no_of_book_can_issue=$result2['issue_book'];
		$fine_per_day=$result2['fine_per_day'];
		
		$result3=mysqli_query($con,"SELECT * FROM `issue_details` WHERE `user_id`='".$lec_id."' AND `is_returned`='No';");
		$numRow=mysqli_num_rows($result3);
		
		if($numRow==$no_of_book_can_issue){
			
			echo "<div class='w3-panel w3-red w3-display-container' >
  <span onclick='this.parentElement.style.display=\"none\"'
  class='w3-button w3-red w3-large w3-display-topright'>&times;</span>
  <h3>Danger!</h3>
  <p>This member can't Borrow more books. Please return privious book .</p>
</div>";
			
			}else{
					$issudeDate=date('Y-m-d');
				//$oldDate = date('Y-m-d');
				$addedDays = $no_of_day_can_issue;
				$newDate = date('Y-m-d', strtotime($issudeDate. " + {$addedDays} days"));

				//$returnDeadline=date('Y-m-d' , strtotime('$no_of_day_can_issue days'));
				$queary2="INSERT INTO `issue_details` (`issue_id`, `book_id`, `user_id`, `issued_date`, `return_dedline`, `returned_date`, `is_returned`, `fine`, `fine_per_day`) VALUES (NULL, '".$book_id."', '".$lec_id."', '".$issudeDate."', '".$newDate."', '', 'No', '', '".$fine_per_day."');";
				
				$queary3="DELETE FROM `reservation` WHERE `reservation`.`reserve_id` = ".$reserve_id."";
				if(mysqli_query($con,$queary2) && mysqli_query($con,$queary3)){
					
					//echo "Issue Completed";
					
					?>
					
					
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
                                    <td width="15%"><?php echo $book_id ?></td>
                                    <td width="15%"><?php echo $lec_id ?></td>
                                    <td><?php echo $title ?></td>
                                    <td width="20%"><?php echo $issudeDate ?></td>
									<td width="20%"><?php echo $newDate ?></td>
                                </tr>
                            
                          
                  </table>
                  
            	
					
					<?php
					}else{
						echo "<div class='w3-panel w3-red w3-display-container' >
  <span onclick='this.parentElement.style.display='none''
  class='w3-button w3-red w3-large w3-display-topright'>&times;</span>
  <h3>Danger!</h3>
  <p>Book Issue not Completed.</p>
</div></div>";
						
						}
				
				}
?>