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
?>
<?php include('config/db_con.php');
include('config/userDetails.php'); ?>
<?php
$queary = "SELECT *FROM issue_details i,book b,notification n WHERE n.issue_id=i.issue_id AND i.book_id=b.book_id";
$result = mysqli_query($con, $queary);
?>

<!DOCTYPE html>
<html lang="en"><head>
        <title>Library Management System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="accetets/bootstrap.min.css">
        <link rel="stylesheet" href="accetets/datatables.min.css">
        <link rel="stylesheet" href="accetets/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

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
                    oTable.columns(2)
                            .search(this.value)
                            .draw();
                })

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
        <?php $page = "notification" ?>
<?php include('config/side_nav.php'); ?>
        <div style="margin-left:12%;">
            <div class="container" style="padding-top:50px">

                <div class="w3-row">

                    <div class="w3-card-4 w3-col s12 w3-margin">
                        <div class="w3-container w3-padding">
                            <div class="row" style="padding-left:16px"><i class="fa fa-bell-o" style="font-size:40px">&nbsp&nbsp</i> <h2>Notifications</h2> </div><hr/>
                        </div>
                        <div class="w3-container">
                          <form  action="GET" id="form">

                                <div class="row w3-section">
                                    <div class="col-sm-2"><h5 class="text-right" style="margin-top:4px"><i class="fa fa-search" style="font-size:30px"></i> &nbsp;Search By :</h5></div>
                                    <div class="col-sm-3">

                                        <input class="w3-input w3-border " name="first" type="text" placeholder="User ID" id="myInputTextField"></div>
                                    <div class="col-sm-3">
                                        <input class="w3-input w3-border " name="first" type="text" placeholder="Date And Time" id="myInputTextField2"></div>

                            </form>
                           
                        </div>

                                
                        
                        <table class="table table-striped table-bordered" id="example">
                            <thead>
                                <tr class="w3-light-grey">
                                    <th>Member ID</th>
                                    <th>Book Name</th>
                                    <th>Send Date</th>
                                    <th>Notification Type</th>
                                    <th>Notification</th>
                                </tr>
                            </thead>

                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                ?> 

                                <tr>
                                    <td><?php echo $row["user_id"]; ?></td>
                                    <td><?php echo $row["title"]; ?></td>
                                    <td><?php echo $row["date"]; ?></td>
                                    <td><?php echo $row["notification_type"]; ?></td>
                                    <td><?php echo $row["notification_desc"]; ?></td>
                                </tr>
<?php } ?>



                        </table>

                    </div>
                </div>

            </div>

        </div></div>
   

    <script type="text/javascript">
       

       

      
    </script>
    
</body>

</html>
