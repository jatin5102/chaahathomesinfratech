<?php 
	include_once '../../config/conn.php';

$id = $_POST['id'];
$sql = "DELETE FROM property_query WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if(!$result){
    die('Query failed '.mysqli_error($conn));
}

?>
