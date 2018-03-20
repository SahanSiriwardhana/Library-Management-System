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

$book_id = $_GET['book_id'];
// call database and get values for form fields and assign to variables as follows.
include('config/db_con.php');
include('config/userDetails.php');
$queary = "SELECT * FROM book b,book_category c WHERE b.category=c.cate_id AND book_id='" . $book_id . "';";
$resu = mysqli_query($con, $queary);

$result = mysqli_fetch_assoc($resu);
$ISBN = $result['ISBN'];
$title = $result['title'];
$category = $result['cate_name'];
$auther = $result['auther'];
$publisher = $result['publisher'];
$addedDate = $result['added_date'];
$avb = $result['availability'];
$image = base64_encode($result['image']);
$book_type = $result['book_type'];
//echo $book_type;
?>

<!DOCTYPE html>
<html lang="en"><head>
        <title>Library Management System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="accetets/bootstrap.min.css">
        <link rel="stylesheet" href="accetetsmaterial-dashboard.css">
        <link rel="stylesheet" href="accetets/DatePicker/datepicker.css">
        <link rel="shortcut icon" href="img/icon2.png" >
        <link rel="stylesheet" href="accetets/w3.css">
        <script src="accetets/jquery-3.2.1.js"></script>
        <script src="accetets/DatePicker/bootstrap-datepicker.js"></script>
        <script src="accetets/jquery.validate.js"></script>
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
            blockquote{
                margin: 10px 0;
                padding-left: 1.2rem;
                border-left: 5px solid #F57A00; /* Just change the color value and that's it*/
            }
            kbd {
                background-color: #1BA70B;  

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

            $(function () {
                $("#datepicker").datepicker();
            });

            $("#fileUpload").change(function () {
                var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                    alert("Only formats are allowed : " + fileExtension.join(', '));
                }
            });

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
        }?>
        <div style="margin-left:12%">
            <div class="container" style="padding-top:50px">

                <div class="w3-row">
                    <div class="w3-card-4 w3-col s4 w3-margin-top w3-padding w3-center" style="margin-right:3%">



                      <?php if ($avb == 'Available') {
                                echo '<kbd style="background-color:#1BA70B">' . $avb . '</kbd>';
                            } else {
                                echo '<kbd style="background-color:red">' . $avb . '</kbd>';
                            }  ?>

                        <hr/>
                        <h2>Reserve This Book Online</h2><br/>

                        <input class="w3-btn w3-red w3-block" type="button" value="Reserve"  <?php if ($avb == "Not Available" || $book_type == 2 ) {
            echo 'disabled';
        } ?> id="process">
                        <img id="myImg" src="<?php echo'data:image/jpeg;base64,' . $image . '' ?>" alt="your image" class="w3-image w3-section"/>
                    </div>
                    <div class="w3-card-4 w3-col s7 w3-margin-top">
                        <div class="w3-container ">
                            <div class="row w3-margin"><i class="fa fa-book" style="font-size:40px">&nbsp</i><h2>Book Details</h2> </div><hr/>
                        </div>
                        <div class="w3-container">
                            <div class="row">
                                <div class="col-md-6">
                                    <blockquote>
                                        <p><i class="fa fa-circle-o"></i> ISBN</p>
                                        <footer><?php echo $ISBN ?></footer>
                                    </blockquote>
                                </div>
                                <div class="col-md-6">
                                    <blockquote>
                                        <p><i class="fa fa-circle-o"></i> Title</p>
                                        <footer><?php echo $title ?></footer>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <blockquote>
                                        <p><i class="fa fa-circle-o"></i> Category</p>
                                        <footer><?php echo $category ?></footer>
                                    </blockquote>
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <blockquote>
                                        <p><i class="fa fa-circle-o"></i> Author</p>
                                        <footer><?php echo $auther ?></footer>
                                    </blockquote>
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <blockquote>
                                        <p><i class="fa fa-circle-o"></i> Publisher</p>
                                        <footer><?php echo $publisher ?></footer>
                                    </blockquote>
                                </div>
                                <div class="col-md-6">
                                    <blockquote>
                                        <p><i class="fa fa-circle-o"></i> Added Date</p>
                                        <footer><?php echo $addedDate ?></footer>
                                    </blockquote>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div><div id="load"></div>
        <script type="text/javascript">
            $('#process').click(function () {
                // $("#check2").html("");
                // $("#submit").hide();
                // $("#opt1").html('');
                // $("#loading").show();
                var book_id = <?php echo $book_id; ?>;
                var user_id =<?php echo '32'; ?>;
                $.ajax({url: "test7.php?book_id=" + book_id + "&user_id=" + user_id, cache: false, success: function (result) {

                        $("#load").html(result);
                        //   $("#loading").hide();
                        //  $("#load").hide(1).show(500);
                    }});
            });
        </script>

    </body>

</html>
