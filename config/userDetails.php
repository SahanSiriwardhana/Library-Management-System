<?php

$userid=$_SESSION['uid'];
 if($usertype=='Lec'){
				$quary2="SELECT * FROM `lecture` WHERE `lec_id` = '".$userid."'";
				$result=mysqli_fetch_assoc(mysqli_query($con,$quary2));
				
						//session_start();
						$fname1 = $result['fName'];
						$lname1 = $result['lName'];
						$email1 = $result['emali'];
						$telephone1 = $result['telephone'];
						$address1 = $result['address'];
						$image1 = base64_encode($result['image']);
				
			}elseif($usertype=='Std'){
					$quary2="SELECT * FROM `student` WHERE `st_id` = '".$userid."'";
					$result=mysqli_fetch_assoc(mysqli_query($con,$quary2));
					$fname1 = $result['fName'];
						$lname1 = $result['lName'];
						$email1 = $result['emali'];
						$telephone1 = $result['telephone'];
						$address1 = $result['address'];
						$image1 = base64_encode($result['image']);
						
			}else{
					$quary2="SELECT * FROM `user` WHERE `emp_id` = '".$userid."'";	
						$result=mysqli_fetch_assoc(mysqli_query($con,$quary2));
						//$username2=$row3['fName'];
						$fname1 = $result['fName'];
						$lname1 = $result['lName'];
						$email1 = $result['emali'];
						$telephone1 = $result['telephone'];
						//$address1 = $result['address'];
						$style='display:none';
						$image1 = base64_encode($result['image']);
						
						}
						?>