<?php
session_start();

//Hash password to save in the database
//  $hash=password_hash($password,algo:PASSWORD_BCRYPT);
include('config/db_con.php');

if ($_SESSION['utype']) {
    $uname = $_SESSION['uname'];
    $usertype = $_SESSION['utype'];
} else {

    header("location:login.php");
}

include('config/userDetails.php');
$queary = "SELECT * FROM `faculty`";
$result = mysqli_query($con, $queary);
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

        <?php include('config/side_nav.php'); ?>
        <div style="margin-left:13%">
            <div class="container" style="padding-top:50px">

                <div class="w3-row" id="check">

                </div>

                <div class="w3-row">
                    <div class="w3-card-4 w3-col s7 w3-margin-top">
                        <div class="w3-container "><div class="row w3-margin">
                                <i class="fa fa-briefcase" style="font-size:40px">&nbsp </i>
                                <h2>Lecturer Registration Form</h2></div><hr/>
                        </div>
                        <div class="w3-container">
                            <form  method="POST" id="form1" action="config/lecReg.php" >


                                <div class="w3-padding">
                                    <input class="w3-input w3-border" name="lid" type="text" placeholder="Lecture ID" data-validation="required"></div>
                                <div class="w3-half w3-padding">      

                                    <input class="w3-input w3-border" name="fname" type="text" placeholder="First Name" data-validation="required"></div>
                                <div class="w3-half w3-padding">      

                                    <input class="w3-input w3-border" name="lname" type="text" placeholder="Last Name" data-validation="required"></div>
                                <div class="w3-padding">
                                    <input class="w3-input w3-border" name="email" type="text" placeholder="Email Address" data-validation="email"></div>
                                <div class="w3-padding">

                                    <input class="w3-input w3-border" name="TelNum" type="number" placeholder="Telephone Number" id='mobile-num' data-validation="required"><span id="folio-invalid" class="hidden mob-helpers" style="color:#B52323">

                                    </span></div>
                                <div class="w3-padding">
                                    <textarea class="w3-input w3-border" placeholder="Address" data-validation="required" name="address"></textarea></div>
                                <div class="w3-padding">
                                   <select class="w3-select w3-border" name="faulty" data-validation="required" data-validation-error-msg="Please Select a Faculty">
                                        <option value="" disabled selected>---Select Faculty---</option>
<?php while ($row = mysqli_fetch_array($result)) {
    ?>
                                            <option value="<?php echo $row['fac_id']; ?>"><?php echo $row['fac_name']; ?></option>
                                        <?php } ?>
                                    </select></div>


                                <div class="w3-padding ">
                                    <button class="w3-btn w3-block w3-black w3-margin-bottom w3-padding-large" type="submit" name="submit" id="submit" value="submit">Register</button></div>


                        </div>
                    </div>
                    <div class="w3-card-4 w3-col s4 w3-margin-top w3-padding w3-center" style="margin-left:50px">
                        <h2>Upload a photo</h2><hr/>

                        <img id="myImg" src="img/20170214_58a28e23853ae-210x210.png" alt="your image" class="w3-circle" style="height:150px;width:150px"/>
                        </form>  <div class="w3-padding ">
                        </div>

                    </div>
                </div>
                <div id="opt1">




                </div>
            </div></div>

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
                                    $('#form1')[0].reset();
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
