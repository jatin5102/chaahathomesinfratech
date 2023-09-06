<?php
	include_once '../../config/conn.php';
	
	$city_id = $_POST['city_id'];


	$location_id = '';
	if(isset($_POST['location_id'])){
		$location_id = $_POST['location_id'];
	}

	$sql = "SELECT * FROM locality WHERE city_id = '$city_id'";
	$query = mysqli_query($conn, $sql) or die('Error :'.mysqli_connect_error($conn));
	
	$sublocation = "<option value=''>---Select Location---</option>";
	if(mysqli_num_rows($query) > 0){
		while($row = mysqli_fetch_array($query)){
			$id = $row['id'];
			$name = $row['address'];
			$check_con = $location_id ==  $id ? 'selected="selected"' : '';

			$sublocation .= "
				<option value=$id  $check_con>$name</option>
			";
		}
		
		echo json_encode($sublocation);
	}else{
		echo json_encode($sublocation);
	}
?>