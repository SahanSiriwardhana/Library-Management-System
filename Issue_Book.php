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
include('config/db_con.php');
include('config/userDetails.php');
?>

<!DOCTYPE html>
<html lang="en"><head>
        <title>Library Management System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="accetets/bootstrap.min.css">
        <link rel="stylesheet" href="accetets/datatables.min.css">
        <link rel="stylesheet" href="accetets/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="accetets/jquery-ui-1.12.1.custom/jquery-ui.min.css" type="text/css" /> 
        <link rel="shortcut icon" href="img/icon2.png" >
        <link rel="stylesheet" href="accetets/w3.css">
        <script src="accetets/jquery-3.2.1.js"></script>
        <script src="accetets/jquery.validate.js"></script>
        <script src="accetets/bootstrap.min.js"></script>
        <script src="accetets/datatables.min.js"></script>
        <script src="accetets/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="accetets/bootstrap-4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="accetets/bootstrap-4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <style>
            body{
                background-color:
            }
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
        <?php $page = "issue" ?>
        <?php include('config/side_nav.php'); ?>
        <div style="margin-left:11%;">
            <div class="container" style="padding-top:50px">

                <div class="w3-row">
                    <div class="w3-card-4 w3-col s12 w3-margin">

                        <div class="w3-container w3-padding">
                            <div class="row" style="padding-left:16px"><i class="fa fa-book" style="font-size:40px">&nbsp&nbsp</i> <h2>Issue a Book</h2> </div><hr/>
                        </div>
                        <div class="w3-container">
                            <div class="w3-row">
                                <div class="w3-col s7" style="padding-right:2%">
                                    <form action="config/issue_Engin.php" method="post" id="form1">
                                        <div class="w3-padding ">
                                            <input class="w3-input w3-border auto" name="bookid" type="text" placeholder="Book ID" id="id"><div id="otherdiv"></div><button type="button" class="w3-btn w3-red" id="process"><i class="fa fa-refresh"></i> Process</button></div>
                                        <div class="w3-padding ">
                                            <select class="w3-select w3-border" name="memberType" data-validation="required" data-validation-error-msg="Please Select a Member Type">
                                                <option value=""  selected>Select Member Type</option>
                                                <option value="Lec">Lecturer</option>
                                                <option value="Std">Student</option>
                                                <option value="User">Other</option>
                                            </select>

                                        </div>
                                        <div class="w3-padding ">
                                            <input class="w3-input w3-border" name="memberID" type="text" placeholder="Member ID" data-validation="required"></div>
                                        <div class="w3-padding"><input type="submit" class="w3-btn w3-block w3-black" value="Issue" id="submit"></div>





                                </div>
                                <div class="w3-col s5 " style="padding-right:1%;margin-top:8px" id="load">

                                </div></form>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="w3-row">

                    <div id="opt1"  ></div>
                </div>
            </div></div>
        <script type="text/javascript" src="accetets/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>  
        <script type="text/javascript">
            $(function () {

                //autocomplete
                $(".auto").autocomplete({
                    source: "config/LiveSearch.php",
                    minLength: 1,
                    select: function (event, ui) {
                        //var names = ui.item.data.split("|");   

                        //$('#otherdiv').val(names[1]);     
                        if (ui.item) {
                            $('#otherdiv').val(ui.item.data);
                            //$('#otherdiv').labale
                        }
                    }
                });

            });

            $('#process').click(function () {
                // $("#check2").html("");
                // $("#submit").hide();
                $("#opt1").html('');
                $('#submit').removeAttr('disabled');
                var id = $('#id').val();
                $.ajax({url: "test5.php?id=" + id, cache: false, success: function (result) {

                        $("#load").html(result);
                        $("#load").hide(1).show(500);
                    }});
            });
            $(function () {
                // $("#submit").hide();
                $('#submit').attr('disabled', 'disabled');
            });

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

                        // $('#submit').attr('disabled','disabled');
                        $("#form1 :input").val('');

                    }
                });

            });
        </script>
        <script src="accetets/form-validator/jquery.form-validator.js"></script>
    </body>

</html>
