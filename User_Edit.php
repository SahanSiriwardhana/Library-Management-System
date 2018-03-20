<?php
session_start();
if ($_SESSION['utype']) {
    $uname = $_SESSION['uname'];
    $usertype = $_SESSION['utype'];
} else {

    header("location:login.php");
}

function random_password($length = 10) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr(str_shuffle($chars), 0, $length);
    return $password;
}

$password = random_password(10);

$emp_id = $_GET['emp_id'];
// call database and get values for form fields and assign to variables as follows.
include('config/db_con.php');
include('config/userDetails.php');
$queary = "SELECT * FROM user s, user_acount a WHERE emp_id = '" . $emp_id . "' AND s.emp_id=a.id;";
$resu = mysqli_query($con, $queary);
$result = mysqli_fetch_assoc($resu);
$fname = $result['fName'];
$lname = $result['lName'];
$emali = $result['emali'];
$telephone = $result['telephone'];
$user_type = $result['user_type'];
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


        <script src="accetets/bootstrap.min.js"></script>
        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="accetets/bootstrap-4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="accetets/bootstrap-4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="accetets/jquery-ui-1.12.1.custom/jquery-ui.css">
        <script src="accetets/jquery-ui-1.12.1.custom/jquery-ui.js"></script>



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
            $(function () {
                $("#datepicker").datepicker();
            });





        </script>
    </head>
    <body>

        <?php include('config/nav.php'); ?>

        <?php include('config/side_nav.php'); ?>
        <div style="margin-left:12%">
            <div class="container" style="padding-top:50px">

                <div class="w3-row">
                    <div class="w3-card-4 w3-col s7 w3-margin-top">
                        <div class="w3-container ">
                            <div class="row w3-margin"><i class="fa fa-user" style="font-size:40px">&nbsp</i><h2> Edit User Form</h2> </div><hr/>
                        </div>
                        <div class="w3-container">
                            <form  action="config/updateUser.php" id="form1" method="post">

                                <div class="w3-padding">
                                    <input class="w3-input w3-border" name="empID" type="text" placeholder="Employee ID" data-validation="required" readonly value="<?php echo $emp_id; ?>"></div>

                                <div class="w3-half w3-padding">      

                                    <input class="w3-input w3-border" name="fname" type="text" placeholder="First Name"data-validation="required" value="<?php echo $fname; ?>"></div>
                                <div class="w3-half w3-padding">      

                                    <input class="w3-input w3-border" name="lname" type="text" placeholder="Last Nmae" data-validation="required" value="<?php echo $lname; ?>"></div>

                                <div class="w3-padding">
                                    <input class="w3-input w3-border" name="email" type="text" placeholder="Email" data-validation="email" value="<?php echo $emali; ?>"></div>
                                <div class="w3-padding">
                                    <input class="w3-input w3-border" name="mobil" type="number" placeholder="Telephone No" id='mobile-num' data-validation="required" value="<?php echo $telephone; ?>"><span id="folio-invalid" class="hidden mob-helpers" style="color:#B52323"></span></div>
                                <div class="w3-padding">
                                    <select class="w3-select w3-border" name="userType" data-validation="required">
                                        <option value="" disabled selected>---Select User Type---</option>
                                        <option value="User" <?php if ($user_type == "User") {
            echo 'selected';
        } ?> >Librarian</option>
                                        <option value="Admin" <?php if ($user_type == "Admin") {
            echo 'selected';
        } ?>>Library Administrator</option>

                                    </select></div>
                                <div class="w3-padding ">
                                    <button class="w3-btn w3-block w3-black w3-margin-bottom w3-padding-large" type="submit" name="submit" value="submit">Register</button></div>
                            </form>

                        </div>
                    </div>
                    <div class="w3-card-4 w3-col s4 w3-margin-top w3-padding w3-center" style="margin-left:50px">
                        <h2>Upload a photo</h2><hr/>
                        <div id="dropbox"></div>
                        <img id="myImg" src="img/20170214_58a28e23853ae-210x210.png" alt="your image" class="w3-image" />
                        <div class="w3-padding ">
                        </div>
                    </div>
                </div>

            </div></div><div id="opt1"></div>
        <script src="accetets/form-validator/jquery.form-validator.js"></script>
        <script type="text/javascript">
            $(function () {
                // setup validate
                $.validate({

                    // modules : 'file',
                    onSuccess: function () {

                        $.post($("#form1").attr("action"),
                                $("#form1 :input").serializeArray(),
                                function (info1) {
                                    $("#opt1").html(info1);
                                })
                        return false;
                        $("#form1 :input").val('');

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
                            $("#folio-invalid").html("Please put 10  digit mobile number");
                            //alert('Please put 10  digit mobile number');
                            $("#folio-invalid").removeClass("hidden");
                            $("#mobile-valid").addClass("hidden");
                            event.preventDefault();
                            return false;
                        }
                    } else {
                        //  alert('Not a valid number');
                        $("#folio-invalid").removeClass("hidden");
                        $("#mobile-valid").addClass("hidden");
                        event.preventDefault();
                        return false;
                    }

                });

            });


        </script>

    </body>

</html>
