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
$password = random_password(10);
$std_id = $_GET['std_id'];
include('config/db_con.php');
$queary = "SELECT * FROM `faculty`";
$queary1 = "SELECT * FROM `degree` ORDER BY `degree`.`deg_name` ASC ";
$queary2 = "SELECT * FROM `student` WHERE `st_id` = '" . $std_id . "'";
$result = mysqli_query($con, $queary);
$result1 = mysqli_query($con, $queary1);
$result2 = mysqli_query($con, $queary2);

$resu = mysqli_fetch_assoc($result2);
$fname = $resu['fName'];
$lname = $resu['lName'];
$email = $resu['emali'];
$telephone = $resu['telephone'];
$address = $resu['address'];
$selectFacul = $resu['faculty'];
$degreefech = $resu['degree'];
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

        <?php include('config/side_nav.php'); ?>
        <div style="margin-left:13%">
            <div class="container" style="padding-top:50px">

                <div class="w3-row">
                    <div class="w3-card-4 w3-col s7 w3-margin-top">
                        <div class="w3-container ">
                            <div class="row w3-margin"><i class="fa fa-graduation-cap" style="font-size:40px">&nbsp </i><h2>Student Registeration Form</h2> </div><hr/>
                        </div>
                        <div class="w3-container">
                            <form  action="config/updateStd.php" id="form1" method="post">


                                <div class="w3-padding">
                                    <input class="w3-input w3-border" name="stdID" type="text" placeholder="Student ID" data-validation="required" value="<?php echo $std_id; ?>" readonly></div>
                                <div class="w3-half w3-padding">      

                                    <input class="w3-input w3-border" name="Fname" type="text" placeholder="First Name" data-validation="required" value="<?php echo $fname; ?>"></div>
                                <div class="w3-half w3-padding">      

                                    <input class="w3-input w3-border" name="lname" type="text" placeholder="Last Name" data-validation="required" value="<?php echo $lname; ?>"></div>
                                <div class="w3-padding">
                                    <input class="w3-input w3-border" name="email" type="text" placeholder="Email Address" data-validation="email" value="<?php echo $email; ?>"></div>
                                <div class="w3-padding">
                                    <input class="w3-input w3-border" name="telephone" type="number" placeholder="Telephone Number" id='mobile-num' data-validation="required" value="<?php echo $telephone; ?>"><span id="folio-invalid" class="hidden mob-helpers" style="color:#B52323"></span></div>
                                <div class="w3-padding">
                                    <textarea class="w3-input w3-border" placeholder="Address" name="address" data-validation="required" value=""><?php echo $address; ?></textarea ></div>
                                <div class="w3-padding">
                                    <select class="w3-select w3-border" name="fac" data-validation="required" data-validation-error-msg="Please Select a Faculty">
                                        <option value="" disabled selected>---Select Faculty---</option>
                                        <?php while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row['fac_id']; ?>" <?php if ($row['fac_id'] == $selectFacul) {
                                            echo 'selected';
                                        } ?> ><?php echo $row['fac_name']; ?></option>
<?php } ?>
                                    </select></div>
                                <div class="w3-padding">
                                    <select class="w3-select w3-border " name="deg" data-validation="required" data-validation-error-msg="Please Select a Degree">
                                        <option value="" disabled selected>---Select Degree---</option>
                                        <?php while ($row1 = mysqli_fetch_array($result1)) {
                                            ?>
                                            <option value="<?php echo $row1['deg_id']; ?>" <?php if ($row1['deg_id'] == $degreefech) {
                                                echo 'selected';
                                            } ?>><?php echo $row1['deg_name']; ?></option>
<?php } ?>
                                    </select>
                                </div>

                                <div class="w3-padding ">
                                    <button class="w3-btn w3-block w3-black w3-margin-bottom w3-padding-large" type="submit" name="submit">Register</button></div>
                            </form>

                        </div>
                    </div>
                    <div class="w3-card-4 w3-col s4 w3-margin-top w3-padding w3-center" style="margin-left:50px">
                        <h2>Upload a photo</h2><hr/>

                        <img id="myImg" src="img/20170214_58a28e23853ae-210x210.png" alt="your image" class="w3-circle" style="height:150px;width:150px"/>

                    </div>
                </div>




            </div></div><div id="opt1"></div>
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
        </script>
        <script src="accetets/form-validator/jquery.form-validator.js"></script>
    </body>

</html>
