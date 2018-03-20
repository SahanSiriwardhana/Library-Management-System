<?php 

include('db_con.php');

$username1=$_POST['username'];
$password1=md5($_POST['password']);
//echo $password1;
$quary="SELECT * FROM `user_acount` WHERE id='".$username1."' AND password='".$password1."'";
$result=mysqli_query($con,$quary);
$row=mysqli_num_rows($result);

if($row>0){
	//echo "tes";
	//$opt=1;
	echo "No Errors";
	session_start();
	$row2=mysqli_fetch_assoc($result);
	$usertype=$row2['user_type'];
			//echo $usertype;	
			if($usertype=='Lec'){
				$quary2="SELECT * FROM `lecture` WHERE `lec_id` = '".$username1."'";
				$row3=mysqli_fetch_assoc(mysqli_query($con,$quary2));
				$username2=$row3['fName'];
						//session_start();
						$_SESSION['uid']=$username1;
						$_SESSION['uname']=$username2;
						$_SESSION['utype']=$usertype;
						//echo'';
				
			}elseif($usertype=='Std'){
					$quary2="SELECT * FROM `student` WHERE `st_id` = '".$username1."'";
					$row3=mysqli_fetch_assoc(mysqli_query($con,$quary2));
					$username2=$row3['fName'];
						//session_start();
						$_SESSION['uid']=$username1;
						$_SESSION['uname']=$username2;
						$_SESSION['utype']=$usertype;
			}else{
					$quary2="SELECT * FROM `user` WHERE `emp_id` = '".$username1."'";	
						$row3=mysqli_fetch_assoc(mysqli_query($con,$quary2));
						$username2=$row3['fName'];
						//session_start();
						$_SESSION['uid']=$username1;
						$_SESSION['uname']=$username2;
						$_SESSION['utype']=$usertype;
						}
						date_default_timezone_set('Asia/Colombo');
						$dateAndTime= date('Y-m-d  H:i:s') ;
						
						//$ip=get_client_ip();
						$ipaddress = getenv('HTTP_CLIENT_IP');	
				$quary3="INSERT INTO `log_detalis` (`id`, `user_type`, `loged_date&time`, `loged_ip`) VALUES ('".$username1."', '".$usertype."', '".$dateAndTime."', '".$ipaddress."');";
				mysqli_query($con,$quary3);
				//$_SESSION['nic']=$nic;
	}else{
		//$opt =2;
		echo "Your Username or Password is incorrect..";
		}

?>