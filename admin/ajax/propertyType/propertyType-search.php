<?php 
	include_once '../../config/conn.php';
	// date_default_timezone_set("Asia/Calcutta"); 

	$value = $_POST['searchValue'];

	

	if(!empty($_POST['searchValue'])){
		$like = "%".$value."%";
		$searchValue = "WHERE name LIKE '$like'";
	}else{
		$searchValue = "ORDER BY id DESC";
	}


	$sql = "SELECT * FROM property $searchValue";
	$result = mysqli_query($conn, $sql);
	if(!$result){
		die('Query failed '.mysqli_error($conn));
	}
	if(mysqli_num_rows($result)){
			$html = '';
		while($row = mysqli_fetch_assoc($result)){
			
			$id = $row['id'];
			$type = $row['cat_id'];
			$property = $row['name'];
			
			$html .= "<tr>
			<td>$type</td>
			<td>$property</td>
			<td><i class='fa fa-pencil' aria-hidden='true' onclick=editProperty($id)></i></td>
			<td><i class='fa fa-times' aria-hidden='true' onclick=deleteProperty($id)></i></td>
			</tr>";
			}
			echo json_encode($html);
	}
?>