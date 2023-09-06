<?php 
	include_once '../../config/conn.php';
	
	$cat_id = $_POST['cat_id'];

	$type_id = '';
	if(isset($_POST['type_id'])){
		$type_id = $_POST['type_id'];
	}
	
	$sql = "SELECT * FROM property WHERE cat_id = '$cat_id'";
	$query = mysqli_query($conn, $sql) or die('Error :'.mysqli_connect_error($conn));
	
	$type = "<option value=''>---Select Typology---</option>";
	if(mysqli_num_rows($query) > 0){
		while($row = mysqli_fetch_array($query)){
			$id = $row['id'];
			$name = $row['name'];
			$check_con = $type_id ==  $row['id'] ? 'selected="selected"' : ''; 
			$type .= "
				<option value=$id $check_con>$name</option>
			";
		}
		
		echo json_encode($type);
	}else{
		echo json_encode($type);
	}
?>