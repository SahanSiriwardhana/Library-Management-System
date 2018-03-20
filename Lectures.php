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

include('config/db_con.php');
include('config/userDetails.php');
$queary = "SELECT * FROM lecture l,faculty f WHERE f.fac_id=l.faculty;";
$result = mysqli_query($con, $queary);
$queary2 = "SELECT * FROM `faculty` ORDER BY `faculty`.`fac_name` DESC ;";
$result2 = mysqli_query($con, $queary2);
?>

<!DOCTYPE html>
<html lang="en"><head>
        <title>Library Management System</title>
        <meta charset="utf-8">
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

                $('#LecId').keyup(function () {
                    oTable.columns(0)
                            .search(this.value)
                            .draw();
                })

                $('#name').keyup(function () {
                    oTable.columns(1)
                            .search(this.value)
                            .draw();
                })


                $('#msds-select').change(function () {
                    oTable.columns(4)
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

            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>
    <body>

        <?php include('config/nav.php'); ?>

        <?php include('config/side_nav.php'); ?>
        <div style="margin-left:12%;">
            <div class="container" style="padding-top:50px">

                <div class="w3-row">
                    <div class="w3-card-4 w3-col s12 w3-margin">
                        <div class="w3-container w3-padding">
                            <div class="row" style="padding-left:16px"><i class="fa fa-briefcase" style="font-size:40px">&nbsp&nbsp</i> <h2>Lecturers</h2> </div><hr/>
                        </div>
                        <div class="w3-container">
                            <form  action="GET" id="form">
                                <div class="row" style="margin-left:10px">
                                    <button class="w3-btn w3-block w3-red w3-margin-bottom col-md-3" type="button" onClick= "window.location.href = 'Lectur_enter.php';"><i class="fa fa-plus"></i>&nbsp;Add New</button></div>
                                <div class="row w3-section w3-margin">
                                    <div class="w3-col s2">
                                        <h5 class="" style="margin-top:px"><em class="fa fa-search" style="font-size:30px"></em> &nbsp;Search By :</h5>
                                    </div>
                                    <div class="w3-col s2">

                                        <input class="w3-input w3-border " name="first" type="text" placeholder="Lecturer ID" id="LecId"></div>
                                    <div class="w3-col s2">
                                        <input class="w3-input w3-border " name="first" type="text" placeholder="Name" id="name"></div>

                                    <div class="w3-col s2">
                                        <select class="w3-select w3-border " name="option" id="msds-select">
                                            <option value=""  selected>Select Faculty</option>
                                            <?php while ($row2 = mysqli_fetch_array($result2)) {
                                                ?>
                                                <option value="<?php echo $row2['fac_name']; ?>"><?php echo $row2['fac_name'] ?></option>
                                            <?php } ?>
                                        </select></div>


                            </form>

                        </div>

                        <table class="table table-striped table-bordered" id="example">
                            <thead>
                                <tr class="w3-light-grey">
                                    <th>Lecturer ID</th>
                                    <th>Name</th>
                                    <th>Telephone No</th>
                                    <th>Address</th>
                                    <th>Faculty</th>

                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

<?php
while ($row = mysqli_fetch_array($result)) {
    ?> 
                                <tr>
                                    <td><?php echo $row["lec_id"]; ?></td>
                                    <td><?php echo $row["fName"] . " " . $row["lName"]; ?></td>
                                    <td><?php echo $row["telephone"]; ?></td>
                                    <td><?php echo $row["address"]; ?></td>
                                    <td><?php echo $row["fac_name"]; ?></td>

                                    <td><?php echo $row["emali"]; ?></td>
                                    <td><a href="Lectur_edit.php?lec_id=<?php echo $row["lec_id"]; ?>" data-toggle="tooltip" title="Edit This Lecture"><i class="fa fa-pencil" style="font-size:24px;color:blue;" ></i></a> &nbsp;<a href="#" data-toggle="tooltip" title="Delete This Lecture" id="delete_lec_<?php echo $row["lec_id"]; ?>" name="<?php echo $row["lec_id"]; ?>"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:24px;color:red"></i></a></td>
                                </tr>

<?php } ?>



                        </table>

                    </div>
                </div>

            </div>

        </div></div>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            $("[id^='delete_lec']").click(function (event) {
                event.preventDefault();
                if (confirm('Are you sure delete this Lecturer?')) {
                    $.ajax({

                        method: "POST",
                        url: "config/delete_lec.php",
                        data: {id: this.name}
                    })
                            .done(function (msg) {

                                window.location = 'Lectures.php';
                            });
                }



            });
        });
    </script>
</body>

</html>
