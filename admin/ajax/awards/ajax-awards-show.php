<?php 
	include_once '../../config/conn.php';


$sql = "SELECT * FROM awards";
$result = mysqli_query($conn,$sql);

if(!$result){
    die('Query failed '.mysqli_error($conn));
}

$html = '';
while($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $title = $row['cat_title'];

    $html .= '<tr>
        <td><h6>'.$title.'</h6></td>
        <td><a href="javascript:void(0)" onclick=editworkculture('.$id.')><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
        <td><a href="javascript:void(0)" onclick=deleteworkculture('.$id.')><i class="fa fa-times" aria-hidden="true"></i></a></td>
        </tr>';
}

echo json_encode($html);



?>