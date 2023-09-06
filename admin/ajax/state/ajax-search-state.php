<?php 
	include_once '../../config/conn.php';
	
	$val = '';
	if($_POST['name'] != ''){
		$like = $_POST['name'];
		$val = "WHERE name LIKE '%$like%'";
	}else{
		$val = "ORDER BY id DESC";
	}
	
	$sql = "SELECT * FROM state $val";
	$query = mysqli_query($conn, $sql) or die('Error :'.mysqli_connect_error($conn));
	if(mysqli_num_rows($query) > 0){
		$html = "";
		while($row = mysqli_fetch_array($query)){
			$html .= "
				<tr>
					<td>".$row['name']."</td>
					<td><span onclick=edit_state('".$row['id']."')><i class='fa fa-pencil' aria-hidden='true'></i></span></td>
					<td><span onclick=dlt_state('".$row['id']."')><i class='fa fa-times' aria-hidden='true'></i></span></td>
				</tr>
			";
		}
		echo json_encode($html);	
	}else{
		$html = "
			<tr>
				<td>No Data Found</td>
			</tr>
		";
		echo json_encode($html);	
	}
?>	