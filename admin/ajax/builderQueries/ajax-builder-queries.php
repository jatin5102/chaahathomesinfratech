<?php 
	include_once '../../config/conn.php';

$id = $_POST['id']; 
$sql = "SELECT * FROM property_query WHERE developer_id='$id'";
$result = mysqli_query($conn, $sql);

if(!$result){
    die('Query failed '.mysqli_error($conn));
}
$num = 1;
$query = '';
while($row = mysqli_fetch_assoc($result)){
  $sqlBuilderName = "SELECT name FROM developer WHERE id='$id'";
  $sqlBuilderName_result = mysqli_query($conn,$sqlBuilderName);
  $row3 = mysqli_fetch_assoc($sqlBuilderName_result);
  $builderName = $row3['name'];
    $pname = $row['property_name'];
    $name = $row['name'];
    $email = $row['email'];
    $description = $row['description'];
    $query .= '<tr>
    <td>'.$num.'</td>
    <td><span>'.$builderName.'</span><br><span>'.$pname.'</span></td>
    <td>'.$name.'</td>
    <td>'.$email.'</td>
    <td>'.$description.'</td>
    <td><i class="fa fa-times" aria-hidden="true"></i></td>
  </tr>';
  $num++;}
  echo $query;
?>