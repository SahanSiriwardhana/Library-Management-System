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
$queary = "SELECT * FROM book b,book_category c WHERE b.category=c.cate_id;";
$result = mysqli_query($con, $queary);

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
            kbd {
                background-color: #1BA70B;  

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

                $('#bookID').keyup(function () {
                    oTable.columns(0)
                            .search(this.value)
                            .draw();
                })

                $('#isbn').keyup(function () {
                    oTable.columns(1)
                            .search(this.value)
                            .draw();
                })

                $('#title').keyup(function () {
                    oTable.columns(2)
                            .search(this.value)
                            .draw();
                })

                $('#author').keyup(function () {
                    oTable.columns(7)
                            .search(this.value)
                            .draw();
                })

                $('#category').keyup(function () {
                    oTable.columns(3)
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
                            <div class="row" style="padding-left:16px"><i class="fa fa-book" style="font-size:40px">&nbsp&nbsp</i> <h2>Issued Details</h2> </div><hr/>
                        </div>
                        <div class="w3-container">
                            <form  action="GET" id="form">
                                <div class="row" style="margin-left:10px">
                                    <button class="w3-btn w3-block w3-red w3-margin-bottom col-md-3" type="button" onClick= "window.location.href = 'Book_Enter.php';"><i class="fa fa-plus"></i>&nbsp;Add New</button></div>
                                <div class="row w3-section w3-margin">
                                    <div class="w3-col s2">
                                        <h5 class="" style="margin-top:px"><em class="fa fa-search" style="font-size:30px"></em> &nbsp;Search By :</h5>
                                    </div>
                                    <div class="w3-col s2">

                                        <input class="w3-input w3-border " name="first" type="text" placeholder="Book ID" id="bookID"></div>
                                    <div class="w3-col s2">
                                        <input class="w3-input w3-border " name="first" type="text" placeholder="ISBN" id="isbn"></div><div class="w3-col s2">
                                        <input class="w3-input w3-border " name="first" type="text" placeholder="Title" id="title"></div>
                                    <div class="w3-col s2">
                                        <input class="w3-input w3-border " name="first" type="text" placeholder="Author" id="author"></div>
                                    <div class="w3-col s2">
                                        <input class="w3-input w3-border " name="first" type="text" placeholder="Category" id="category"></div>

                            </form>

                        </div>

                        <table class="table table-striped table-bordered" id="example">
                            <thead>
                                <tr class="w3-light-grey">
                                    <th>Member</th>
                                    <th>Book ID</th>
                                    <th>Book Name</th>
                                    <th>Lend Category</th>
                                    <th>Issue Date</th>
                                    <th>Expiry Date</th>
                                    <th>Reeurn Date</th>
                                    <th>Is Returned</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tr>
                                <td>dsvd</td>
                                <td>csdc</td>
                                <td>dvds</td>
                                <td>dsd</td>
                                <td>dfd</td>
                                <td>fsdf</td>
                                <td>fefds</td>
                                <td>fdsf</td>
                                <td>fdsd</td>

                            </tr>




                        </table>

                    </div>
                </div>

            </div>

        </div></div>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            $("[id^='delete_book']").click(function (event) {
                event.preventDefault();
                if (confirm('Are you sure delete this Book?')) {
                    $.ajax({

                        method: "POST",
                        url: "config/delete_book.php",
                        data: {id: this.name}
                    })
                            .done(function (msg) {

                                window.location = 'Books.php';
                            });
                }



            });
        });
    </script>
</body>

</html>
