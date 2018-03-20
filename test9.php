<?php
include('config/db_con.php');





$id = $_GET['id'];

$sel_query = mysqli_query($con, "SELECT * FROM issue_details i,book b WHERE i.book_id=b.book_id AND i.user_id='".$id."' AND i.fine>0") or die(mysql_error($conn));
// $selrow = mysqli_fetch_array($sel_query, MYSQLI_ASSOC);
?>
<p>&nbsp;<strong>Member ID : </strong><?php echo $id;?></p>
<table class="table table-striped table-bordered w3-padding" id="example">
                            <thead>
                                <tr class="w3-light-grey">
                                    <th>Title</th>
                                    <th>Issued Date</th>

                                    <th>Return Deadline</th>
                                     <th>Return Date</th>
									 <th>Delayed Days</th>
                                    <th>Fine</th>
                                </tr>
                            </thead>

                            <?php
                            while ($row = mysqli_fetch_array($sel_query)) {
                                ?> 
                                <tr>
                                    <td><?php echo $row["title"];?></td>
                                    <td><?php echo $row["issued_date"];?></td>

                                    <td> <?php echo $row["return_dedline"];?> </td>
                                    <td><?php echo $row["returned_date"];?></td>
                                    <td><?php echo $row["returned_date"]-$row['return_dedline'];?></td>

                                    <td><?php echo $row["fine"];?> </td>
                                
                                </tr>
<?php } ?>



                        </table>













