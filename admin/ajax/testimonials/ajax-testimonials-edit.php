<?php 
	include_once '../../config/conn.php';
    include_once '../../include/function.php';

$id = encryptor('decrypt',$_POST['id']);


$result = mysqli_query($conn,"SELECT * FROM testimonials_emp WHERE id='$id'");

if($result->num_rows >0){
    $data=mysqli_fetch_assoc($result);
   echo json_encode([
    'status'=>1,
    'data'=>$data
   ]);
}else{
    echo json_encode([
        'status'=>1,
        'message'=>'data not found'
    ]);
}

?>