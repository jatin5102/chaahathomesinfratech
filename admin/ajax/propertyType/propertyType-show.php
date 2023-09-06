<?php 
	include_once '../../config/conn.php';
	
	function get_category($id){
		global $conn;
		$sql_cat = "SELECT * FROM category WHERE id = '$id'";
		$query_cat = mysqli_query($conn, $sql_cat) or die ('Error :'.mysqli_connect_error($conn));
		if(mysqli_num_rows($query_cat) > 0){
			$row_cat = mysqli_fetch_array($query_cat);
			return $cat_name = $row_cat['name'];
		}
	}

	// date_default_timezone_set("Asia/Calcutta"); 

	$sql = "SELECT * FROM property ORDER BY id DESC";
	$result = mysqli_query($conn, $sql);
	if(!$result){
		die('Query failed '.mysqli_error($conn));
	}
	if(mysqli_num_rows($result)){
			$html = '';
		while($row = mysqli_fetch_assoc($result)){
			
			$id = $row['cat_id'];
			$name =  get_category($id);
			
			$id = $row['id'];
			$property = $row['name'];
			
			$html .= "<tr>
			<td>$name</td>
			<td>$property</td>
			<td><i class='fa fa-pencil' aria-hidden='true' onclick=editProperty($id)></i></td>
			<td><i class='fa fa-times' aria-hidden='true' onclick=deleteProperty($id)></i></td>
			</tr>";
			}
			echo json_encode($html);
	}
?>