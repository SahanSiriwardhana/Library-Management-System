<?php
session_start();
if ($_SESSION['utype']) {
    $uname = $_SESSION['uname'];
    $usertype = $_SESSION['utype'];
} else {

    header("location:login.php");
}

function random_password($length = 10) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr(str_shuffle($chars), 0, $length);
    return $password;
}

$password = random_password(10);

include('config/db_con.php');
include('config/userDetails.php');
$queary = "SELECT * FROM faculty f,degree d,student s WHERE d.deg_id=s.degree AND s.faculty=f.fac_id;";
$result = mysqli_query($con, $queary);
$queary2 = "SELECT * FROM `faculty` ORDER BY `faculty`.`fac_name` ASC ;";
$result2 = mysqli_query($con, $queary2);
$queary3 = "SELECT * FROM `degree` ORDER BY `degree`.`deg_name` ASC;";
$result3 = mysqli_query($con, $queary3);
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

                $('#stdId').keyup(function () {
                    oTable.columns(0)
                            .search(this.value)
                            .draw();
                })

                $('#name').keyup(function () {
                    oTable.columns(1)
                            .search(this.value)
                            .draw();
                })

                $('#telephone').keyup(function () {
                    oTable.columns(2)
                            .search(this.value)
                            .draw();
                })
                $('#msds-select').change(function () {
                    oTable.columns(4)
                            .search(this.value)
                            .draw();
                });
                $('#deg').change(function () {
                    oTable.columns(5)
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
                            <div class="row" style="padding-left:16px"><i class="fa fa-graduation-cap" style="font-size:40px">&nbsp&nbsp</i> <h2>Student Members</h2> </div><hr/>
                        </div>
                        <div class="w3-container">
                            <form  action="GET" id="form">
                                <div class="row" style="margin-left:10px">
                                    <button class="w3-btn w3-block w3-red w3-margin-bottom col-md-3" type="button" onClick= "window.location.href = 'Student_enter.php';"><i class="fa fa-plus"></i>&nbsp;Add New</button></div>
                                <div class="row w3-section w3-margin">
                                    <div class="w3-col s2">
                                        <h5 class="" style="margin-top:px"><em class="fa fa-search" style="font-size:30px"></em> &nbsp;Search By :</h5>
                                    </div>
                                    <div class="w3-col s2">

                                        <input class="w3-input w3-border " name="first" type="text" placeholder="Student ID" id="stdId"></div>
                                    <div class="w3-col s2">
                                        <input class="w3-input w3-border " name="first" type="text" placeholder="Name" id="name"></div>

                                    <div class="w3-col s2">
                                        <select class="w3-select w3-border " name="option" id="msds-select">
                                            <option value=""  selected>Select Faculty</option>
                                            <?php while ($row = mysqli_fetch_array($result2)) {
                                                ?>
                                                <option value="<?php echo $row['fac_name']; ?>"><?php echo $row['fac_name']; ?></option>
                                            <?php } ?>
                                        </select></div>
                                    <div class="w3-col s2">
                                        <select class="w3-select w3-border " name="option" id="deg">
                                            <option value=""  selected>Select Degree</option>
                                            <?php while ($row2 = mysqli_fetch_array($result3)) {
                                                ?>
                                                <option value="<?php echo $row2['deg_name']; ?>"><?php echo $row2['deg_name']; ?></option>
                                            <?php } ?>
                                        </select></div>

                            </form>

                        </div>

                        <table class="table table-striped table-bordered" id="example">
                            <thead>
                                <tr class="w3-light-grey">
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Telephone No</th>
                                    <th>Address</th>
                                    <th>Faculty</th>
                                    <th>Degree</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

<?php
while ($row1 = mysqli_fetch_array($result)) {
    ?> 
                                <tr>
                                    <td><?php echo $row1['st_id']; ?></td>
                                    <td><?php echo $row1['fName'] . " " . $row1['lName']; ?></td>
                                    <td><?php echo $row1['telephone']; ?></td>
                                    <td><?php echo $row1['address']; ?></td>
                                    <td><?php echo $row1['fac_name']; ?></td>
                                    <td><?php echo $row1['deg_name']; ?></td>
                                    <td><?php echo $row1['emali']; ?></td>
                                    <td><a href="Student_edit.php?std_id=<?php echo $row1["st_id"]; ?>" data-toggle="tooltip" title="Edit This Student"><i class="fa fa-pencil" style="font-size:24px;color:blue;" ></i></a> &nbsp;<a href="#" data-toggle="tooltip" title="Delete This Student" id="delete_std_<?php echo $row1["st_id"]; ?>" name="<?php echo $row1["st_id"]; ?>"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:24px;color:red"></i></a></td>
                                </tr>
<?php } ?>


                        </table>

                    </div>
                </div>

            </div>

        </div></div>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            $("[id^='delete_std']").click(function (event) {
                event.preventDefault();
                if (confirm('Are you sure delete this Student?')) {
                    $.ajax({

                        method: "POST",
                        url: "config/delete_std.php",
                        data: {id: this.name}
                    })
                            .done(function (msg) {

                                window.location = 'Students.php';
                            });
                }



            });
        });
    </script>
</body>

</html>
