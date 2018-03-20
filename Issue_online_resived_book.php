<?php

function random_password($length = 10) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr(str_shuffle($chars), 0, $length);
    return $password;
}

$password = random_password(10);
session_start();
include('config/db_con.php');
if ($_SESSION['utype']) {
    $uname = $_SESSION['uname'];
    $usertype = $_SESSION['utype'];
} else {

    header("location:login.php");
}include('config/db_con.php');
include('config/userDetails.php');


?>

<!DOCTYPE html>
<html lang="en"><head>
        <title>Library Management System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="accetets/bootstrap.min.css">
        <link rel="stylesheet" href="accetets/jquery-ui-1.12.1.custom/jquery-ui.min.css" type="text/css" /> 
        <link rel="stylesheet" href="accetets/datatables.min.css">
        <link rel="stylesheet" href="accetets/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="accetetsmaterial-dashboard.css">
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
            $(document).ready(function () {
                oTable = $('#example').DataTable({

                    "sDom": "ltipr"

                });

                $('#myInputTextField').keyup(function () {
                    oTable.columns(0)
                            .search(this.value)
                            .draw();
                })
                $('#myInputTextField2').keyup(function () {
                    oTable.columns(1)
                            .search(this.value)
                            .draw();
                })

                $('#msds-select').change(function () {
                    oTable.columns(2)
                            .search(this.value)
                            .draw();
                });






                oTable.columns('.select-filter').every(function () {
                    var that = this;

                    // Create the select list and search operation
                    var select = $('<select />')
                            .appendTo(
                                    this.footer()
                                    )
                            .on('change', function () {
                                that
                                        .search($(this).val())
                                        .draw();
                            });

                    // Get the search data for the first column and add to the select list
                    this
                            .cache('search')
                            .sort()
                            .unique()
                            .each(function (d) {
                                select.append($('<option value="' + d + '">' + d + '</option>'));
                            });
                });
            });
        </script>
    </head>
    <body>

        <?php include('config/nav.php'); ?>
        <?php $page = "online" ?>
        <?php include('config/side_nav.php'); ?>
        <div style="margin-left:12%;">
            <div class="container" style="padding-top:50px">

                <div class="w3-row">
                    <div class="w3-card-4 w3-col s12 w3-margin">
                        <div class="w3-container w3-padding">
                            <div class="row" style="padding-left:16px"><i class="fa fa-laptop" style="font-size:40px">&nbsp&nbsp</i> <h2>Issue Online Reserved Books.</h2> </div><hr/>
                        </div>
                        <div class="w3-container">
                            <form  action="GET" id="form">

                                <div class="row w3-section">
                                    <div class="col-sm-2"><h5 class="text-right" style="margin-top:4px"><i class="fa fa-search" style="font-size:30px"></i> &nbsp;Search  :</h5></div>
                                    <div class="col-sm-6">

                                        <input class="w3-input w3-border auto" name="first" type="text" placeholder="Member ID" id="id" title="Enter the Member ID"><div id="otherdiv"></div></div>


                            </form>
                            <div class="col-sm-3 float-right">
                                <button class="w3-btn w3-block w3-red w3-margin-bottom w3-padding" type="button" id="process" ><i class="fa fa-refresh"></i>&nbsp;process</button></div>
                        </div>
                        <i class="fa fa-refresh fa-spin fa-fw" style="display:none" id="loading"></i>
                        <table class="table table-striped table-bordered" id="load">



                        </table>
                        <div class="w3-row">

                            <div id="opt1"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div></div>
    <script type="text/javascript" src="accetets/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script type="text/javascript">
            $(document).ajaxComplete(function () {
                // fire when any Ajax requests complete
                $("[id^='reserve_id']").click(function (event) {
                    event.preventDefault();
                    if (confirm('Are you sure ?')) {
                        var id = $(this).attr('name');

                        alert(id);

                        $.ajax({

                            method: "POST",
                            url: "config/issue_Engin_online.php",
                            data: {id: id},
                            success: function (result) {

                                $("#opt1").html(result);

                            }
                        })
                    }
                });
            })


            $(function () {

                //autocomplete
                $(".auto").autocomplete({
                    source: "config/LiveSearch_LecID.php",
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
                $("#loading").show();
                var id = $('#id').val();
                $.ajax({url: "test8.php?id=" + id, cache: false, success: function (result) {

                        $("#load").html(result);
                        $("#loading").hide();
                        //  $("#load").hide(1).show(500);
                    }});
            });

            $(function () {
                $(document).tooltip();
            });
    </script>
</body>

</html>
