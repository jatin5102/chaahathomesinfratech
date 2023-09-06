<?php 
	include_once '../../config/conn.php';

    $id = $_POST['id'];
    $sqlselect = "SELECT * FROM blogs WHERE id='$id'";
    $result1 = mysqli_query($conn,$sqlselect);

    $row1 = mysqli_fetch_assoc($result1);
    $image = $row1['image'];

    unlink('../../uploads/blogs/'.$image);

    $sql = "DELETE FROM blogs WHERE id='$id'";
    $result = mysqli_query($conn,$sql);

    if(!$result){
        die('Query failed '.mysqli_error($conn));
    }

    




?>