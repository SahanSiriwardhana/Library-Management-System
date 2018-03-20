<?php
include('config/db_con.php');





$id = $_GET['id'];

$sel_query = mysqli_query($con, "SELECT * FROM `circulation_settings` WHERE `Circulation_id` = " . $id . " ") or die(mysql_error($conn));
$selrow = mysqli_fetch_array($sel_query, MYSQLI_ASSOC);
?>


<input class="w3-input w3-border w3-margin-bottom" name="memType" type="text" placeholder="Member Type" value="<?php if ($selrow["member_type"] == 'Lec') {
    echo 'Lecturer';
} elseif ($selrow["member_type"] == 'Std') {
    echo 'Student';
} else {
    echo 'Other';
} ?>" readonly disabled>
<select class="w3-select w3-border w3-margin-bottom" name="len_cat" id="faculty" disabled>
    <option value=""  >Select Lending Type</option>

    <option value="1" <?php if ($selrow['lending_cat'] == '1') {
    echo 'selected';
} ?> >SR</option>
    <option value="2" <?php if ($selrow['lending_cat'] == '2') {
    echo 'selected';
} ?>>PR</option>
    <option value="3" <?php if ($selrow['lending_cat'] == '3') {
    echo 'selected';
} ?>>L</option>

</select>
<input class="w3-input w3-border w3-margin-bottom" name="day" type="text" placeholder="Issued Limit - Days" value="<?php echo $selrow['issue_day']; ?>" title="Enter the Member ID">
<input class="w3-input w3-border w3-margin-bottom" name="book" type="text" placeholder="Issued Limit - Books" value="<?php echo $selrow['issue_book']; ?>">
<input class="w3-input w3-border w3-margin-bottom" name="fine" type="text" placeholder="Fine Per Day - Rs" value="<?php echo $selrow['fine_per_day']; ?>">
<input type="hidden" name="cirId2" id="CatId" value="<?php echo $selrow['Circulation_id'] ?>">













