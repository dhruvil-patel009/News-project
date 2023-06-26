<?php 
include 'common/connection.php';

if($_SESSION['role'] == '0'){
    header ("Location: $hostname/admin/post.php");
}
 

$cat_id = $_GET['id'];

$sql = "DELETE FROM category WHERE Category_id = '$cat_id'";

if(mysqli_query($conn, $sql)){
  header("Location: $hostname/admin/category.php");
}else{
  echo "<p style ='color:red';margin:10px 0;'>Can't Delete Users Record</p>";
}
?>
