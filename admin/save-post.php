<?php 
include "common/connection.php";
session_start();

if(isset($_FILES['fileToUpload'])){
  $errors = array();    // errors ne store karsu 

  $file_name = $_FILES['fileToUpload']['name'];
  $file_size = $_FILES['fileToUpload']['size'];
  $file_tmp = $_FILES['fileToUpload']['tmp_name'];
  $file_type = $_FILES['fileToUpload']['type'];
  $file_ext = end(explode('.', $file_name)); // Extension 6 file ma .pachi nu avse
  $extension = ["jpeg","jpg","png"]; //array 6 // extension api ave cheak karsu


  //extension 
  if(in_array($file_ext,$extension) === false){
    $errors[] = "This extension file not allowed, Please Choose a JPG or PNG file";
  } 

  //size apva
  if($file_size > 2097152){     //Bytes ma avse size 2mb api 6 cheak karva mate (1KB ma 1024bytes ave and 1 mb ma 1048576 bytes ave and 2mb ma 2097152 ) (1024 * 1024*2) = 2mb ni bytes
    $errors[] = "fiLE size must be 2MB or lower."; 
  }

  // same name ni image na ave te mate time store karse name ma 
  $new_name = time(). "-" .basename($file_name);
  $target = "upload/".$new_name;
  $image_name = $new_name;

  // error chek karva
  if(empty($errors) == true){
    move_uploaded_file($file_tmp, $target); // img upload karva 
  }else{
    print_r($errors);   // error ni print karvi hoy tao loop chlvi padse badhi error mate
    die();
  } 
}

$title = mysqli_real_escape_string($conn, $_POST['post_title']);
$Desc = mysqli_real_escape_string($conn, $_POST['postdesc']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$date = date("d M, Y");
$author = $_SESSION['userid'];


$sql = "Insert INTO post(title, description, category, post_date, author, post_img) VALUES('$title','$Desc','$category','$date','$author','$image_name');";  // 2 semi colum avse 

$sql .= "UPDATE category SET post = post + 1 WHERE Category_id = {$category}";  // .= means insert query ma j join karyu 

//Multiple query ne run karva mate (mysqli_multi_query()) use thase

if(mysqli_multi_query($conn,$sql)){
    header("Location:$hostname/admin/post.php");  
}else
{
  echo '<div class="alert alert-danger" role="alert"><b>Query Failed '.mysqli_error($conn).'</b></div>';
}

?>