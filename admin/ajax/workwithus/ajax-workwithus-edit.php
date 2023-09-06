<?php 
	include_once '../../config/conn.php';

$id = $_POST['id'];

$sql = "SELECT * FROM workwithus WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if(!$result){
    die('Query failed '.mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
echo json_encode($row);

?>