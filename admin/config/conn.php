


<?php
define('BASE_URL','http://localhost/chaahat/');
define('ADMIN_URL','http://localhost/chaahat/admin/');
define('ADMIN_ASSETS','http://localhost/chaahat/admin/uploads/');






// $servername = "sg2nlmysql1plsk.secureserver.net";
// $username = "CapitalBoonPhP";
// $password = "Data2020##";
// $database = "admin_CapitalBoonPhP";

// $conn = mysqli_connect($servername, $username, $password, $database);

// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }



$servername = "localhost";
$username = "root";
$password = "";
$database = "admin_CapitalBoonPhP";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}



?>