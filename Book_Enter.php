<?php

function random_password($length = 10) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr(str_shuffle($chars), 0, $length);
    return $password;
}

session_start();
$password = random_password(10);
if ($_SESSION['utype']) {
    $uname = $_SESSION['uname'];
    $usertype = $_SESSION['utype'];
} else {

    header("location:login.php");
}
include('config/db_con.php');
include('config/userDetails.php');
$queary = "SELECT * FROM `book_category`";
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
        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="accetets/bootstrap-4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="accetets/bootstrap-4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="accetets/jquery-ui-1.12.1.custom/jquery-ui.css">


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
        <div style="margin-left:12%">
            <div class="container" style="padding-top:3%">

                <div id="check" class="w3-row w3-margin-top">

                </div>


                <!-- Modal -->


                <div class="w3-row">
                    <div class="w3-card-4 w3-col s7 w3-margin-top">
                        <div class="w3-container ">
                            <div class="row w3-margin"><i class="fa fa-book" style="font-size:40px">&nbsp</i><h2>Enter Book</h2> </div><hr/>
                        </div>
                        <div class="w3-container">
                            <form   id="form" method="post"  enctype="multipart/form-data">



                                <div class="w3-half w3-padding">      

                                    <input class="w3-input w3-border" name="bookID" type="text" placeholder="Book ID" data-validation="required" id="bookID"></div>
                                <div class="w3-half w3-padding">      

                                    <input class="w3-input w3-border" name="isbn" type="text" placeholder="ISBN" data-validation="length" data-validation-length="10-13" data-validation-error-msg="Please enter number in 10-13" id="isbn"></div>
                                <div class="w3-padding">
                                    <input class="w3-input w3-border" name="title" type="text" placeholder="Title" data-validation="required" id="title"></div>
                                <div class="w3-padding">
                                    <select class="w3-select w3-border" name="cat" data-validation="required" data-validation-error-msg="Please Select a Category" id="cat">
                                        <option value=""  selected>---Select Category---</option>
                                        <?php while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_name'] ?></option>
                                        <?php } ?>

                                    </select></div>

                                <div class="w3-padding">
                                    <input class="w3-input w3-border" name="author" type="text" placeholder="Author" data-validation="required" id="author" ></div>
                                <div class="w3-padding">
                                    <input class="w3-input w3-border" name="publisher" type="text" placeholder="Publisher" data-validation="required" id="publisher"></div>

                                <div class="w3-padding">
                                    <select class="w3-select w3-border " name="bookType" data-validation="required" data-validation-error-msg="Please Select a Book Type" id="bookType">
                                        <option value=""  selected>---Select Type of Book---</option>
                                        <option value="1">SR</option>
                                        <option value="2">PR</option>
                                        <option value="3">L</option>
                                    </select>
                                </div>
                                <div class="w3-padding">
                                    <input class="w3-input w3-border" id="datepicker" name="datepicker" type="text" placeholder="Added Date" data-validation="date" data-validation-format="mm/dd/yyyy" data-validation-error-msg="Please Select a Added Date" ></div>
                                <div class="w3-padding ">
                                    <button class="w3-btn w3-block w3-black w3-margin-bottom w3-padding-large"  value="submit" id="submit" name="submit">Register</button></div>


                        </div>
                    </div>
                    <div class="w3-card-4 w3-col s4 w3-margin-top w3-padding w3-center" style="margin-left:50px">
                        <h2>Upload a photo</h2><hr/>

                        <img id="myImg" src="img/book.png" alt="your image" class="w3-image" />
                        <input  type="file" name="fileToUpload" id="fileToUpload" data-validation="required extension" data-validation-allowing="png" accept="image/*" class="w3-btn"/> <p id="demo"></p> <div class="w3-padding ">
                            <div id="imageVal"></div> </form></div>
                    </div>

                </div>
            </div></div>

        <div id="result"></div>





        <script src="accetets/form-validator/jquery.form-validator.js"></script>


        <script src="accetets/jquery-ui-1.12.1.custom/jquery-ui.js"></script>


        <script>
            $.validate({
                modules: 'file',
                onSuccess: function (event) {

                }
            });
            $(function () {
                $("#datepicker").datepicker();
            });

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
                            var src1 = "img/book.png";
                            $.ajax({
                                url: 'config/book_enter.php',
                                data: formData,
                                processData: false,
                                contentType: false,
                                type: 'POST',
                                success: function (data) {
                                    //alert(data);
                                    $('#result').html(data);
                                    $('#form')[0].reset();
                                    $("#myImg").attr("src", src1);
                                }
                            })

                        }
                    }

                });

            });
        </script>
    </body>

</html>
