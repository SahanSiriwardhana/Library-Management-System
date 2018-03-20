<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'library');


if (isset($_GET['term'])){
    $return_arr = array();
	$return_arr2 = array();

    try {
        $conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare('SELECT * FROM `user_acount` WHERE id LIKE :term ');
        $stmt->execute(array('term' => '%'.$_GET['term'].'%'));
        
        while($row = $stmt->fetch()) {
           // $return_arr[] = array("id"=> $row['book_id'],"value"=>$row['title']);
			 //$return_arr["id"] =  $row['book_id'];
			 //$return_arr["title"] =  $row['title'];
			 //array_push($return_arr2, $return_arr);array("value"=>$row['id'],"label"=>$row['username']);
			  $return_arr[] =$row['id'];
        }

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }


    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}

?>