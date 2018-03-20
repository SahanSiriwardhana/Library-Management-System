<?php
//var_dump($_FILES);
include('config/db_con.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Library Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="accetets/bootstrap.min.css">
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


            .row{
                width:auto;
                height: auto;
            }
            .col-md-6 ,.col-md-4{
                background-color:  #f2f2f2;	
                height: ;
            }	


            .form-horizontal{
                position: relative;
                top: ;
                font-color:#ffeee6;
                font-size:16px;
            }
            .new{
                position:relative;
                top:25%;
            }
            .form-horizontal{
                border:1px solid #5E5D5D;

            }
            a:link {
                text-decoration: none;
                color:inherit;
            }

            a:visited {
                text-decoration: none;
            }

            a:hover {
                text-decoration: none;
                color:blue;
            }
        </style>
    </head>


    <body>

        <div class="row" height="" style="margin-top:">

            <div class="col-md-6 ">
                <img src="img/15.png" class="img-responsive" alt="Cinque Terre"  height="500px">
            </div>

            <div class="col-md-6 " height="" >

                <form class="form-horizontal  col-md-10 w3-margin-top" style="height:90%" action="config/password_reset.php" method="post" id="form1">

                    <div class="new">
                        <h2 class="col-md-offset-2">&nbsp;&nbsp;Please Enter Your Email </h2>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="username"><p> </p></label>
                            <div class="col-sm-8">
                                <input type="text" class="w3-input w3-border" id="username" placeholder="Username" data-validation="required" data-validation-error-msg="Please Enter Username" name="username">
                            </div>

                        </div>
                        <div id="opt1" class="col-sm-offset-3"></div>

                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>Reseted Password is sending to your Email </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-8">
                                <button type="submit" class="w3-btn w3-large w3-block w3-black" onClick="">Send</button>
                            </div>
                        </div>
                        <p class="col-md-offset-7"><a href="Login.php">Return to Login</a></p>
                    </div>
                </form>
            </div>

        </div>

    </div>
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


    </script>
    <script src="accetets/form-validator/jquery.form-validator.js"></script>
</body>

</html>