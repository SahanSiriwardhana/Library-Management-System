<?php
date_default_timezone_set('Asia/Colombo');


$currentDay=date('Y-m-d');
$currentMonth=date('Y-m');
function random_password($length = 10) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr(str_shuffle($chars), 0, $length);
    return $password;
}

$password = random_password(10);
session_start();

if ($_SESSION['utype']!='') {
    $uname = $_SESSION['uname'];
    $usertype = $_SESSION['utype'];

    if ($usertype == 'Std' || $usertype == 'Lec') {
        header("location:Books.php");
    }
} else {

    header("location:login.php");
}

include('config/db_con.php');
include('config/userDetails.php');
$queary = "SELECT * FROM `issue_details` ";
$queary2 = "SELECT * FROM `issue_details` WHERE `is_returned` = 'No'";

$result = mysqli_query($con, $queary);
$numRow = mysqli_num_rows($result);

$result2 = mysqli_query($con, $queary2);
$numRow2 = mysqli_num_rows($result2);
?>

<!DOCTYPE html>
<html lang="en"><head>
        <title>Library Management System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="accetets/bootstrap.min.css">
        <link rel="stylesheet" href="accetetsmaterial-dashboard.css">
        <link rel="shortcut icon" href="img/icon2.png" >
        <link rel="stylesheet" href="accetets/w3.css">
        <script src="accetets/jquery-3.2.1.js"></script>
        <script src="accetets/jquery.validate.js"></script>
        <script src="accetets/bootstrap.min.js"></script>
        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="accetets/bootstrap-4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="accetets/bootstrap-4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="accetets/morrisjs/morris.css">

        <script src="accetets/raphael/raphael.min.js"></script>
        <script src="accetets/morrisjs/morris.min.js"></script>

        <style>
            a:link {
                text-decoration: none;
            }

            a:visited {
                text-decoration: none;
            }

            a:hover {
                text-decoration: none;
            }

            a:active {
                text-decoration: none;
            }
            .navbar-login
            {
                width: 305px;
                padding: 10px;
                padding-bottom: 0px;
            }

            .navbar-login-session
            {
                padding: 1px;
                padding-bottom: 0px;
                padding-top: 0px;
            }

            .icon-size
            {
                width: 100px;
				
            }
        </style>
        <script type="text/javascript">
            $(function () {
                $(":file").change(function () {
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            });

            function imageIsLoaded(e) {
                $('#myImg').attr('src', e.target.result);
            }
            ;


            function myAccFunc() {
                var x = document.getElementById("demoAcc");
                //x=document.getElementById("demoAcc2");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                    x.previousElementSibling.className += " w3-gray";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                    x.previousElementSibling.className =
                            x.previousElementSibling.className.replace(" w3-gray", "");
                }


            }

            function myAccFunc2() {
                //x = document.getElementById("demoAcc");
                var x = document.getElementById("demoAcc2");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                    x.previousElementSibling.className += " w3-gray";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                    x.previousElementSibling.className =
                            x.previousElementSibling.className.replace(" w3-gray", "");
                }


            }
            function myAccFunc3() {
                //x = document.getElementById("demoAcc");
                var x = document.getElementById("demoAcc3");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                    x.previousElementSibling.className += " w3-gray";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                    x.previousElementSibling.className =
                            x.previousElementSibling.className.replace(" w3-gray", "");
                }


            }
        </script>
    </head>
    <body>
<?php include('config/nav.php'); ?>

        <?php $page = "index" ?>
        <?php include('config/side_nav.php'); ?>




        <div style="margin-left:13%" >
            <div class="container" style="padding-top:70px">
                <div class="row w3-margin">
                    <div class="col-3 w3-card-2" >
                        <div id="donut-example" style="height:300px" ></div></div>
                    <div class="col-8 w3-card-2 w3-padding" style="margin-left:10px">
                        <h2 class="text-center">Issued and Returned Report for <?php echo date('Y'); ?></h2><hr/>
                        <div id="bar-example" style="height:300px" > </div></div>
                </div>
                <h2 >Overall Report</h2>
                <div class="card-deck" >
                    <div class="w3-card card " >
<?php $numBook = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `book`"));
?>
                        <div class="card-block w3-blue">
                            <h4 class="card-title"><?php echo $numBook; ?></h4><div class="row">
                                <p class="card-text text-right" style="margin-top:10px">Total Number of Books&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><i class="fa fa-book" style="font-size:66px"></i></div>
                        </div>
                        <div class="card-footer">
                           <a href="Books.php" onClick="window.location.href='Books.php'"> <small class="text-muted">More Information &nbsp;<i class="fa fa-arrow-circle-right"></i></small></a>
                        </div>
                    </div>
                    <div class="w3-card card ">
<?php $numTotIssue = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `issue_details`"));
?>
                        <div class="card-block w3-red">
                            <h4 class="card-title"><?php echo $numTotIssue; ?></h4><div class="row">
                                <p class="card-text text-right" style="margin-top:10px">Total Number of Issued Books
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><i class="fa fa-mail-forward" style="font-size:66px"></i>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted" >More Information &nbsp;<i class="fa fa-arrow-circle-right"></i></small> 
                        </div>
                    </div>
                    <div class="w3-card card">
<?php $numMem = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `user_acount`"));
?>
                        <div class="card-block w3-green">
                            <h4 class="card-title"><?php echo $numMem; ?></h4><div class="row">
                                <p class="card-text text-right" style="margin-top:10px">Total Number of Members&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><i class="fa fa-users" style="font-size:66px"></i></div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted ">More Information &nbsp;<i class="fa fa-arrow-circle-right"></i></small>
                        </div>
                    </div>

                </div><hr/>




                <h2 >Today's Report</h2>
                <div class="card-deck" style="margin-top:10px">
                    <div class="w3-card card ">
<?php
$today=date('m/d/Y');
 $numBookToday = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `book` WHERE added_date='".$today."'"));
?>
                        <div class="card-block w3-blue">
                            <h4 class="card-title"><?php echo $numBookToday?></h4><div class="row">
                                <p class="card-text text-right" style="margin-top:10px">Today's Added Books&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><i class="fa fa-book" style="font-size:66px"></i></div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">More Information &nbsp;<i class="fa fa-arrow-circle-right"></i></small>
                        </div>
                    </div>
                    <div class="w3-card card ">
<?php $numTotIssueToday = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `issue_details` WHERE issued_date='".$currentDay."'"));
?>
                        <div class="card-block w3-red">
                            <h4 class="card-title"><?php echo $numTotIssueToday?></h4><div class="row">
                                <p class="card-text text-right" style="margin-top:10px">Today's Issued Books
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                <em class="fa fa-mail-forward" style="font-size:66px"></em></div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">More Information &nbsp;<i class="fa fa-arrow-circle-right"></i></small>
                        </div>
                    </div>
                    <div class="w3-card card">
<?php $numTotReturnToday = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `issue_details` WHERE returned_date='".$currentDay."'"));
?>
                        <div class="card-block w3-green">
                            <h4 class="card-title"><?php echo $numTotReturnToday;?></h4><div class="row">
                                <p class="card-text text-right" style="margin-top:10px">Today's Returned Books
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><i class="fa fa-mail-reply" style="font-size:66px"></i></div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted ">More Information &nbsp;<i class="fa fa-arrow-circle-right"></i></small>
                        </div>
                    </div>
                    <div class="w3-card card">
<?php $numMem = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `user_acount` WHERE enter_date='".$currentDay."'"));
?>
                        <div class="card-block w3-deep-orange">
                            <h4 class="card-title"><?php echo $numMem;?></h4><div class="row">
                                <p class="card-text text-right" style="margin-top:10px">
                                    Today's Added Members&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><i class="fa fa-users" style="font-size:66px"></i></div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted ">More Information &nbsp;<i class="fa fa-arrow-circle-right"></i></small>
                        </div>
                    </div>

                </div><hr/>

                <h2 >Current Month's Report</h2>
                <div class="card-deck" style="margin-top:10px">
                    <div class="w3-card card ">
<?php
$currentYear=date('Y');
$currenDay=date('m');
 $numBookMonth = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `book` WHERE added_date LIKE '".$currenDay."%".$currentYear."'"));
?>
                        <div class="card-block w3-blue">
                            <h4 class="card-title"><?php echo $numBookMonth; ?></h4><div class="row">
                                <p class="card-text text-right" style="margin-top:10px">This month's Added Books&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><i class="fa fa-book" style="font-size:66px"></i></div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">More Information &nbsp;<i class="fa fa-arrow-circle-right"></i></small>
                        </div>
                    </div>
                    <div class="w3-card card ">
<?php $numIssueMo = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `issue_details` WHERE issued_date LIKE '".$currentMonth."%'"));
?>
                        <div class="card-block w3-red">
                            <h4 class="card-title"><?php echo $numIssueMo;?></h4><div class="row">
                                <p class="card-text text-right" style="margin-top:10px">This month's Issued Books
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                <em class="fa fa-mail-forward" style="font-size:66px"></em></div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">More Information &nbsp;<i class="fa fa-arrow-circle-right"></i></small>
                        </div>
                    </div>
                    <div class="w3-card card">
<?php $thisMonthRet = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `issue_details` WHERE returned_date LIKE '".$currentMonth."%'"));
?>
                        <div class="card-block w3-green">
                            <h4 class="card-title"><?php echo $thisMonthRet?></h4><div class="row">
                                <p class="card-text text-right" style="margin-top:10px">This month's Returned Books
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><i class="fa fa-mail-reply" style="font-size:66px"></i></div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted ">More Information &nbsp;<i class="fa fa-arrow-circle-right"></i></small>
                        </div>
                    </div>
                    <div class="w3-card card">
<?php $thisMonthMem = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `user_acount` WHERE enter_date LIKE '".$currentMonth."%'"));
?>
                        <div class="card-block w3-deep-orange">
                            <h4 class="card-title"><?php echo $thisMonthMem;?></h4><div class="row">
                                <p class="card-text text-right" style="margin-top:10px">
                                    This month's Added Members&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><i class="fa fa-users" style="font-size:66px"></i></div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted ">More Information &nbsp;<i class="fa fa-arrow-circle-right"></i></small>
                        </div>
                    </div>

                </div><hr/>
<?php 
for($x=1;$x<=12;$x++){
	if($x>=10){
		$numIssue[$x] = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `issue_details` WHERE issued_date LIKE '".$currentYear."-".$x."%'"));
		$numReturn[$x]=mysqli_num_rows(mysqli_query($con, "SELECT * FROM `issue_details` WHERE issued_date LIKE '".$currentYear."-".$x."%' AND is_returned='Yes'"));
		}else{
$numIssue[$x] = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `issue_details` WHERE issued_date LIKE '".$currentYear."-0".$x."%'"));
$numReturn[$x] = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `issue_details` WHERE issued_date LIKE '".$currentYear."-0".$x."%' AND is_returned='Yes'"));
	}}
?>
            </div></div>
        <script type="text/javascript">
            $(function () {
                $("#form").validate({
                    rules: {
                        first: {
                            required: true,

                        }},
                    messages: {

                    }
                });
            });

            Morris.Donut({
                element: 'donut-example',
                data: [
                    {label: "Total Issued Books", value: <?php echo $numRow; ?>},
                    {label: "Not Returned", value: <?php echo $numRow2; ?>},
                ]
            });

            Morris.Bar({
                element: 'bar-example',
                data: [
                    {month: 'January', a: <?php echo $numReturn[1];?>, b: <?php echo $numIssue[1];?>},
                    {month: 'February', a: <?php echo $numReturn[2];?>, b: <?php echo $numIssue[2];?>},
                    {month: 'March', a: <?php echo $numReturn[3];?>, b: <?php echo $numIssue[3];?>},
                    {month: 'April', a: <?php echo $numReturn[4];?>, b: <?php echo $numIssue[4];?>},
                    {month: 'May', a: <?php echo $numReturn[5];?>, b: <?php echo $numIssue[5];?>},
                    {month: 'June', a: <?php echo $numReturn[6];?>, b: <?php echo $numIssue[6];?>},
                    {month: 'July', a: <?php echo $numReturn[7];?>, b: <?php echo $numIssue[7];?>},
                    {month: 'August', a: <?php echo $numReturn[8];?>, b: <?php echo $numIssue[8];?>},
                    {month: 'September', a: <?php echo $numReturn[9];?>, b: <?php echo $numIssue[9];?>},
                    {month: 'October', a: <?php echo $numReturn[10];?>, b: <?php echo $numIssue[10];?>},
                    {month: 'November', a: <?php echo $numReturn[11];?>, b: <?php echo $numIssue[11];?>},
                    {month: 'December', a: <?php echo $numReturn[12];?>, b: <?php echo $numIssue[12];?>}
                ],
                xkey: 'month',
                ykeys: ['a', 'b'],
                labels: ['Total Return', 'Total Issued']
            });
        </script>
    </body>

</html>
