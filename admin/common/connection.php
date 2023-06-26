<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'news-site';


$hostname = "http://localhost/News-Project";  // common location use to all page in header(Location: "$hostname/admin/add-user.php")

$conn = mysqli_connect($servername,$username,$password,$dbname) or die("Connection failed : " . mysqli_connect_error($conn));


?>
