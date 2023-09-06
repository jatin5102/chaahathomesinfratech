<?php 
	include_once '../../config/conn.php';
	
	$state_id = $_POST['state_id'];

	$city_id = '';
	if(isset($_POST['city_id'])){
		$city_id = $_POST['city_id'];
	}
	
	$sql = "SELECT * FROM city WHERE state_id = '$state_id'";
	$query = mysqli_query($conn, $sql) or die('Error :'.mysqli_connect_error($conn));
	
	$city = "<option value=''>---Select City---</option>";
	if(mysqli_num_rows($query) > 0 ){
		while($row = mysqli_fetch_array($query)){
			$id = $row['id'];
			$name = $row['city_name'];
			$check_con = $city_id ==  $row['id'] ? 'selected="selected"' : ''; 
			$city .= "
				<option value=$id $check_con>$name</option>
			";
		}
		echo json_encode($city);
	}else{
		echo json_encode($city);
	}
?>