<?php 
	include_once '../../config/conn.php';

$id = $_POST['id'];

$sqlSelect = "SELECT * FROM jobapplication WHERE id=''";
$resultSelect = mysqli_query($conn, $sqlSelect);

$rowPdf = mysqli_fetch_assoc($resultSelect);
$resume = $rowPdf['resume'];

unlink('uploads/jobapplication/'.$resume.'');

$sql = "DELETE FROM jobapplication WHERE id='$id'";
$result = mysqli_query($conn,$sql);

if(!$result){
    die('Query failed '.mysqli_error($conn));
}

$sql1 = "SET @autoid:=0";
$result1 = mysqli_query($conn, $sql1);

$sql2 = "Update jobapplication set id = @autoid:= (@autoid+1)";
$result2 = mysqli_query($conn, $sql2);

$sql3 = "Alter table jobapplication Auto_increment=1";
$result3 = mysqli_query($conn, $sql3);

?>