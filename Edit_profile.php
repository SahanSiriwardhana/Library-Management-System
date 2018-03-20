<?php

function random_password($length = 10) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr(str_shuffle($chars), 0, $length);
    return $password;
}

session_start();
if ($_SESSION['utype']) {
    $uname = $_SESSION['uname'];
    $usertype = $_SESSION['utype'];
	
} else {

    header("location:login.php");
}

//$lec_id = $_GET['lec_id'];
// call database and get values for form fields and assign to variables as follows.
include('config/db_con.php');
include('config/userDetails.php');




?>

<!DOCTYPE html>
<html lang="en"><head>
        <title>Library Management System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="accetets/bootstrap.min.css">

        <link rel="shortcut icon" href="img/icon2.png" >
        <link rel="stylesheet" href="accetets/w3.css">
        <script src="accetets/jquery-3.2.1.js"></script>
        <script src="accetets/jquery.validate.js"></script>
        <script src="accetets/bootstrap.min.js"></script>
        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="accetets/bootstrap-4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="accetets/bootstrap-4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
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
            .hidden{
                display: none;
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

       <?php
        if ($usertype == 'Std' || $usertype == 'Lec') {
            include('config/side_nav2.php');
        } else {
            include('config/side_nav.php');
        }
        ?>
        <div style="margin-left:13%">
            <div class="container" style="padding-top:50px">

                <div class="w3-row" id="check">

                </div>

                <div class="w3-row">
                    <div class="w3-card-4 w3-col s12 w3-margin-top">
                        <div class="w3-container "><div class="row w3-margin">
                                <i class="fa fa-user" style="font-size:40px">&nbsp </i>
                                <h2> My Profile</h2></div><hr/>
                        </div>
                        <div class="w3-container">
                            <form  method="POST" id="form1" action="config/updateProfile.php">
                                <input type="hidden" name="userType" value="<?php echo $usertype ?>"/>

                                <div class="w3-padding">
                                    <input class="w3-input w3-border" name="uid" type="text" placeholder="Lecture ID" data-validation="required" value="<?php echo $userid ?>" readonly></div>
                                <div class="w3-half w3-padding">      

                                    <input class="w3-input w3-border" name="fname" type="text" placeholder="First Name" data-validation="required" value="<?php echo $fname1 ?>"></div>
                                <div class="w3-half w3-padding">      

                                    <input class="w3-input w3-border" name="lname" type="text" placeholder="Last Name" data-validation="required" value="<?php echo $lname1 ?>"></div>
                                <div class="w3-padding">
                                    <input class="w3-input w3-border" name="email" type="text" placeholder="Email Address" data-validation="email" value="<?php echo $email1 ?>"></div>
                                <div class="w3-padding">

                                    <input class="w3-input w3-border" name="TelNum" type="number" placeholder="Telephone Number" id='mobile-num' data-validation="required" value="<?php echo $telephone1 ?>"><span id="folio-invalid" class="hidden mob-helpers" style="color:#B52323">

                                    </span></div>
                             
                               


                                <div class="w3-padding ">
                                    <button class="w3-btn w3-block w3-black w3-margin-bottom w3-padding-large" type="submit" name="submit" id="submit">Update Profile</button></div>

  </form>
                        </div>
                        
                         
                    </div>
                    
                    
                    <div id="opt1"></div>

                </div>

            </div></div>

        <script type="text/javascript">





            $(function () {
                // setup validate
                $.validate({

                    modules: 'file',
                    onSuccess: function () {

				  $.post($("#form1").attr("action"),
                                $("#form1 :input").serializeArray(),
                                function (info1) {
                                    $("#opt1").html(info1);
                                })
                        return false;

                       
						
					 


                    }
                });

            });

            $(document).ready(function () {

                $("#mobile-num").on("blur", function () {
                    var mobNum = $(this).val();
                    var filter = /^\d*(?:\.\d{1,2})?$/;

                    if (filter.test(mobNum)) {
                        if (mobNum.length == 10) {
                            //  alert("valid");
                            $("#mobile-valid").removeClass("hidden");
                            $("#folio-invalid").addClass("hidden");
                        } else {
							//$('#form1').submit.preventDefault();
                            $("#folio-invalid").html("Please put 10  digit mobile number");
                            //alert('Please put 10  digit mobile number');
                            $("#folio-invalid").removeClass("hidden");
                            $("#mobile-valid").addClass("hidden");
                            return false;
                        }
                    } else {
                        //  alert('Not a valid number');
                        $("#folio-invalid").removeClass("hidden");
                        $("#mobile-valid").addClass("hidden");
                        return false;
                    }

                });

            });

/////////////////////////////////////////////////////////////////////////////////////////////
  

        </script>
        <script src="accetets/form-validator/jquery.form-validator.js"></script>

    </body>

</html>
