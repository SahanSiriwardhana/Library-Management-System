<?php
include('config/db_con.php');
$id = $_GET['id'];
if ($id != "") {
    $sel_query = mysqli_query($con, "SELECT * FROM `book` WHERE `book_id` = '" . $id . "' ") or die(mysql_error($con));
    $row = mysqli_num_rows($sel_query);
    if ($row != 0) {
        $selrow = mysqli_fetch_array($sel_query, MYSQLI_ASSOC);
//$image1=base64_encode($selrow['image']);
        ?>


        <div class="row w3-border">

            <img class="w3-image w3-margin" src="<?php echo'data:image/jpeg;base64,' . base64_encode($selrow['image']) . '' ?>" style="width:150px" style="margin-left:10px">
            <blockquote>
                <h2> <?php echo $selrow['title']; ?>.</h2>
                <footer> Author : <?php echo $selrow['auther']; ?><br> <?php
        if ($selrow['book_type'] == "2") {

            echo '<p style="color:red">This Book can\'t Issue (PR).</p><script>$(function(){
   $("#submit").attr("disabled","disabled");
  });</script>';
        } else {
            if ($selrow['availability'] != "Available") {

                echo '<p style="color:red"> not Available .</p><script>$(function(){
   $("#submit").attr("disabled","disabled");
  });</script>';
            } else {
                echo '<input type="hidden" value="' . $selrow['book_type'] . '" name="bookType"><p style="color:blue"> Available .</p><script>$(function(){
    $("#submit").removeAttr("disabled");
  });</script>';
            }
        }
        ?>

        <?php ?>
                </footer>
            </blockquote>

        </div>

    <?php } else {
        echo '<p style="color:red">Please Enter valide Book ID</p><script>$(function(){
   $("#submit").attr("disabled","disabled");
  });</script>';
    }
} else {
    echo '<p style="color:red">Please Enter Book ID</p><script>$(function(){
   $("#submit").attr("disabled","disabled");
  });</script>';
} ?>










