<?php 
	include_once '../../config/conn.php';


session_start();
$email = $_POST['email'];
$password = $_POST['password'];


// //	insert query
// // $sql = "INSERT INTO login(email, password) VALUES('$email', '$password')";
// // $result = mysqli_query($conn, $sql);

// // if(!$result){
// // 	die('Query failed '.mysqli_error($conn));
// // }

$sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

// if(!$result){
// 	die('Query failed '.mysqli_error($conn));
// }else{

	if($row = mysqli_fetch_array($result)){
		$_SESSION['email'] = $row['email'];
		$_SESSION['password'] = $row['password'];

		if($_SESSION['email'] == $email && $_SESSION['password'] == $password){
			echo 1;
		}
	}else{
		echo 0;
	}

// }




// // if(mysqli_num_rows($result) > 0){

// // 	$row = mysqli_fetch_assoc($result);
// // 	$db_email = $row['email'];
// // 	$db_password = $row['password'];

// // 	echo $email;
// // 	echo $password;
// // 	echo $db_email;
// // 	echo $db_password;
// // 	// if($email == $db_email){
		
// // 	// 	echo "1";
	
// // 	// }else{
// // 	// 	echo "0";
// // 	// }
	
		
// // }
























// include '../../config/conn.php';
    
// session_start();
// $email = $_POST['email'];
// $password  = $_POST['password'];
// // $password = MD5($pswrd);



// $sql = " SELECT * FROM login WHERE email = '$email' AND password = '$password' ";

// $query = mysqli_query($conn, $sql) or die("Error: " . mysqli_connect_error($conn));

// if(mysqli_num_rows($query) > 0){
// 	$row = mysqli_fetch_assoc($query);
	
// 	if ($row['email'] === $email &&  $row['password'] === $password) {
		
// 		$_SESSION['email'] = $row['email'];
// 		$_SESSION['id'] = $row['id'];
// 		// $_SESSION['is_logged_in'] = 1;
// 		echo 1;
// 		// exit();
// 	}
// }
// else{
// 	echo 0;
// }

?>
