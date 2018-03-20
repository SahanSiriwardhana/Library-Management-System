<?php
include('config/db_con.php');


$queary2 = "SELECT * FROM `faculty` ORDER BY `faculty`.`fac_name` DESC ;";
$result2 = mysqli_query($con, $queary2);


$id = $_GET['id'];

$sel_query = mysqli_query($con, "SELECT * FROM `degree` WHERE `deg_id` ='" . $_GET['id'] . "'") or die(mysql_error($conn));
$selrow = mysqli_fetch_array($sel_query, MYSQLI_ASSOC);
?>

<select class="w3-select w3-border w3-margin-bottom" name="facualtyUp" id="faculty">
    <option value=""  selected>Select Faculty</option>
    <?php while ($row3 = mysqli_fetch_array($result2)) {
        ?>
        <option value="<?php echo $row3['fac_id']; ?>" 
        <?php if ($row3['fac_id'] == $selrow['fac_id']) {
            echo 'selected';
        } ?> ><?php echo $row3['fac_name'] ?></option>
            <?php } ?>
</select>


<input class="w3-input w3-border " name="degNameUpdate" type="text" placeholder="Category Name" id="CatName"  value="<?php echo $selrow['deg_name'] ?>">
<input type="hidden" name="degId2" id="CatId" value="<?php echo $selrow['deg_id'] ?>">













