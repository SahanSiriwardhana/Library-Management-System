<?php

include('config/db_con.php');

if (isset($_POST["submit"])) {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //echo $_POST['bookID'];
    $bookID = test_input($_POST['bookID']);
    $isbn = test_input($_POST['isbn']);
    $title = test_input($_POST['title']);
    $category = test_input($_POST['cat']);
    $numOfCopy = test_input($_POST['numCpy']);
    $author = test_input($_POST['author']);
    $publisher = test_input($_POST['publisher']);
    $bookType = test_input($_POST['bookType']);
    $addedDate = test_input($_POST['datepicker']);
    $image = $_FILES["fileToUpload"]["name"];
    echo $isbn;

    try {

        $queary = "INSERT INTO `book` (`book_id`, `ISBN`, `title`, `category`, `no_of_copies`, `publisher`, `auther`, `added_date`, `availability`, `book_type`, `image`) VALUES ('" . $bookID . "', '" . $isbn . "', '" . $title . "', '" . $category . "', '" . $numOfCopy . "', '" . $publisher . "', '" . $author . "', '" . $addedDate . "', 'Available', '" . $bookType . "', '" . $image . "')";

        if (mysqli_query($con, $queary)) {

            $target_dir = "img/Upload/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
// Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
// Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
// Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            echo '<div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success!</strong> This alert box could indicate a successful or positive action.
  </div>';
        } else {
            echo '<div class="w3-panel w3-red w3-display-container"><span onclick="this.parentElement.style.display="none" "
  class="w3-button w3-red w3-large w3-display-topright">&times;</span>
  <h3>Danger.....!</h3>
  <p>Book is not added to database</p>
</div> ';
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
?>