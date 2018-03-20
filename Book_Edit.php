<?php

function random_password($length = 10) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr(str_shuffle($chars), 0, $length);
    return $password;
}

$password = random_password(10);
session_start();
if ($_SESSION['utype']) {
    $uname = $_SESSION['uname'];
    $usertype = $_SESSION['utype'];
} else {

    header("location:login.php");
}
$book_id = $_REQUEST['book_id'];
// call database and get values for form fields and assign to variables as follows.
include('config/db_con.php');
include('config/userDetails.php');
$queary = "SELECT * FROM book b,book_category c WHERE b.category=c.cate_id AND book_id='" . $book_id . "';";
$resu = mysqli_query($con, $queary);

$result = mysqli_fetch_assoc($resu);
$ISBN = $result['ISBN'];
$title = $result['title'];
$category = $result['category'];
$auther = $result['auther'];
$publisher = $result['publisher'];
$addedDate = $result['added_date'];

$book_type = $result['book_type'];
//$avb=$result['availability'];
$image = base64_encode($result['image']);

$queary2 = "SELECT * FROM `book_category`";
$result = mysqli_query($con, $queary2);
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
                            <div class="row w3-margin"><i class="fa fa-book" style="font-size:40px">&nbsp</i><h2> Edit Book</h2> </div><hr/>
                        </div>
                        <div class="w3-container">
                            <form id="form1" method="post" action="config/book_edit.php" >



                                <div class="w3-half w3-padding">      

                                    <input class="w3-input w3-border" name="bookID" type="text" placeholder="Book ID" data-validation="required" id="bookID" value="<?php echo $book_id ?>" readonly title="Book ID"></div>
                                <div class="w3-half w3-padding">      

                                    <input class="w3-input w3-border" name="isbn" type="text" placeholder="ISBN" data-validation="length" data-validation-length="10-13" data-validation-error-msg="Please enter number in 10-13" id="isbn" value="<?php echo $ISBN ?>" title="ISBN"></div>
                                <div class="w3-padding">
                                    <input class="w3-input w3-border" name="title" type="text" placeholder="Title" data-validation="required" id="title" value="<?php echo $title ?>" title="Title"></div>
                                <div class="w3-padding">
                                    <select class="w3-select w3-border" name="cat" data-validation="required" data-validation-error-msg="Please Select a Category" id="cat" title="Select Category">
                                        <option value="" >---Select Category---</option>
                                        <?php while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row['cate_id']; ?>" <?php if ($row['cate_id'] == $category) {
                                            echo 'selected';
                                        } ?> ><?php echo $row['cate_name'] ?></option>
                                        <?php } ?>

                                    </select></div>
                               
                                <div class="w3-padding">
                                    <input class="w3-input w3-border" name="author" type="text" placeholder="Author" data-validation="required" id="author" value="<?php echo $auther
                                        ?>" title="Author"></div>
                                <div class="w3-padding">
                                    <input class="w3-input w3-border" name="publisher" type="text" placeholder="Publisher" data-validation="required" id="publisher" value="<?php echo $publisher ?>" title="Publisher"></div>

                                <div class="w3-padding">
                                    <select class="w3-select w3-border " name="bookType" data-validation="required" data-validation-error-msg="Please Select a Book Type" id="bookType" title="Select Type of Book">
                                        <option value=""  selected>---Select Type of Book---</option>
                                        <option value="1" <?php if ($book_type == 1) {
                                               echo 'selected';
                                           } ?> >SR</option>
                                        <option value="2" <?php if ($book_type == 2) {
                                               echo 'selected';
                                           } ?> >PR</option>
                                        <option value="3" <?php if ($book_type == 3) {
                                               echo 'selected';
                                           } ?>>L</option>
                                    </select>
                                </div>
                                <div class="w3-padding">
                                    <input class="w3-input w3-border" id="datepicker" name="datepicker" type="text" placeholder="Added Date" data-validation="date" data-validation-format="mm/dd/yyyy" data-validation-error-msg="Please Select a Added Date" value="<?php echo $addedDate ?>" title="Added Date"></div>
                                <div class="w3-padding ">
                                    <button class="w3-btn w3-block w3-black w3-margin-bottom w3-padding-large"  value="submit" name="submit" type="submit">Edit</button></div>


                        </div>
                    </div>
                    <div class="w3-card-4 w3-col s4 w3-margin-top w3-padding w3-center" style="margin-left:50px">
                        <h2>Book Image</h2><hr/>

                        <img id="myImg" src="<?php echo'data:image/jpeg;base64,' . $image . '' ?>" alt="your image" class="w3-image w3-margin-bottom" />
                    </div>
                    </form></div>
            </div>
        </div>

    </div></div>

<div id="result"></div>


<script>
    $(function () {
        // setup validate
        $.validate({

            // modules : 'file',
            onSuccess: function () {

                $.post($("#form1").attr("action"),
                        $("#form1 :input").serializeArray(),
                        function (info1) {
                            $("#result").html(info1);
                        })
                return false;
                $("#form1 :input").val('');

            }
        });

    });

    $(function () {
        $("#datepicker").datepicker();
    });
    $(function () {
        $(document).tooltip();
    });


</script>


<script src="accetets/form-validator/jquery.form-validator.js"></script>


<script src="accetets/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

</body>

</html>
