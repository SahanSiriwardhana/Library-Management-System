<?php
include('config/db_con.php');
$id = $_GET['id'];
if ($id != "") {
    $sel_query = mysqli_query($con, "SELECT * FROM reservation r , book b WHERE r.lecture_id = '" . $id . "' AND b.book_id=r.book_id") or die(mysql_error($con));
    $row = mysqli_num_rows($sel_query);
    if ($row != 0) {


//$selrow=mysqli_fetch_array($sel_query,MYSQLI_ASSOC);
        ?>

        <thead>
            <tr class="w3-light-grey">
                <th>Book ID</th>
                <th>Book Title</th>

                <th>Action</th>
            </tr>
        </thead>
        <?php
        while ($row2 = mysqli_fetch_array($sel_query)) {
            ?> 
            <tr>
                <td><?php echo $row2["book_id"]; ?></td>
                <td><?php echo $row2["title"]; ?></td>

                <td><a href="#" data-toggle="tooltip" title="Issue This Book" id="reserve_id_<?php echo $row2["reserve_id"]; ?>" name="<?php echo $row2["reserve_id"]; ?>"><i class="fa fa-share" aria-hidden="true" style="font-size:24px;color:blue"></i></a></td>
            </tr>

        <?php } ?>



    <?php } else {
        echo '<p style="color:red">No Records </p>';
    }
} else {
    echo '<p style="color:red">Please Enter  User ID</p>';
}
?>










