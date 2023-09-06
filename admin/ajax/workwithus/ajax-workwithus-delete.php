<?php 
	include_once '../../config/conn.php';

$id = $_POST['id'];

$sql = "DELETE FROM workwithus WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if(!$result){
    die('Query failed '.mysqli_error($conn));
}

$sql1 = "SET @autoid:=0";
$result1 = mysqli_query($conn, $sql1);

$sql2 = "update workwithus set id = @autoid := (@autoid+1)";
$result2 = mysqli_query($conn, $sql2);

$sql3 = "alter table workwithus Auto_increment=1";
$result3 = mysqli_query($conn, $sql3);

?>