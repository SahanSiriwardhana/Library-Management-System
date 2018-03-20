<?php
include('config/db_con.php');
$id = $_GET['id'];
if ($id != "") {
    $sel_query = mysqli_query($con, "SELECT * FROM issue_details i,book b WHERE i.user_id = '" . $id . "' AND i.is_returned='No' AND b.book_id=i.book_id") or die(mysql_error($con));
    $row = mysqli_num_rows($sel_query);
    if ($row != 0) {


//$selrow=mysqli_fetch_array($sel_query,MYSQLI_ASSOC);
        ?>

        <thead>
            <tr class="w3-light-grey">
                <th>Book ID</th>
                <th>Book Title</th>
                <th>Issued Date</th>
                <th>Dead Line</th>
                <th>Is Returned</th>
                <th>Fine</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
        while ($row2 = mysqli_fetch_array($sel_query)) {
            ?> 
            <tr>
                <td><?php echo $row2["book_id"]; ?></td>
                <td><?php echo $row2["title"]; ?></td>
                <td><?php echo $row2["issued_date"]; ?></td>
                <td><?php echo $row2["return_dedline"]; ?></td>
                <td><kbd style="background-color:red"><?php echo $row2["is_returned"]; ?></kbd></td>
                <td><?php echo $row2["fine"]; ?></td>
                <td><a href="#" data-toggle="tooltip" title="Return This Book" id="delete_cir_<?php echo $row2["issue_id"]; ?>" name="<?php echo $row2["issue_id"]; ?>"><i class="fa fa-reply" aria-hidden="true" style="font-size:24px;color:blue"></i></a></td>
            </tr>

        <?php } ?>



    <?php } else {
        echo '<p style="color:red">No Records </p>';
    }
} else {
    echo '<p style="color:red">Please Enter  User ID</p>';
}
?>










