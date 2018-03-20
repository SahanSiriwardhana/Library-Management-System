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
                   
                    <div class="w3-card-4 w3-col s4 w3-margin-top w3-padding w3-center" style="margin-left:50px">
                        <h2>Upload a photo</h2><hr/>
<form method="POST" id="form" enctype="multipart/form-data">
                        <img id="myImg" src="<?php echo'data:image/jpeg;base64,' . $image1 . '' ?>" alt="your image" class="w3-circle" style="height:150px;width:150px" />
 <input  type="file" name="fileToUpload" id="fileToUpload"   accept="image/*" class="w3-btn"/> <p id="demo"></p>
 <input type="hidden" name="userid" value="<?php echo $userid; ?>">
 <input type="hidden" name="usertype" value="<?php echo $usertype; ?>">
  <button class="w3-btn w3-block w3-black w3-margin-bottom w3-padding-large" type="submit" name="submit2" id="submit3">Upload</button>
<div id="imageVal"></div>
</form>
                    </div>
                    
                    <div id="result"></div>

                </div>

            </div></div>

        <script type="text/javascript">





           

            $(document).ready(function () {
                $('#form').submit(function (event) {

                    event.preventDefault();
                    var image_name = $("#fileToUpload").val();
                    if (image_name == '') {
                        // alert("Please Enter Image");
                        $('#imageVal').html('<p style="color:red">Please Select a Image</p>');
                        return false;
                    } else {
                        var extention = $('#fileToUpload').val().split('.').pop().toLowerCase();
                        if (jQuery.inArray(extention, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                            //alert("Invalide image file");
                            $("#fileToUpload").val('');
                            $('#imageVal').html('<p style="color:red">Invalide image file</p>');
                            return false;
                        } else {
                            $('#imageVal').html('');
                            var form = $('#form')[0]; // You need to use standard javascript object here
                            var formData = new FormData(form);
                           // var src1 = "img/book.png";
                            $.ajax({
                                url: 'config/updateProfilePic.php',
                                data: formData,
                                processData: false,
                                contentType: false,
                                type: 'POST',
                                success: function (data) {
                                    //alert(data);
                                    $('#result').html(data);
                                    $('#form')[0].reset();
                                   // $("#myImg").attr("src", src1);
                                }
                            })

                        }
                    }

                });

            });

/////////////////////////////////////////////////////////////////////////////////////////////
  

        </script>
        <script src="accetets/form-validator/jquery.form-validator.js"></script>

    </body>

</html>
