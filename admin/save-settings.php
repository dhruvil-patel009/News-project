<?php
include 'common/connection.php';

if(empty($_FILES['logo']['name'])){
    $file_name = $_POST['old_image'];
}else{
  $errors = array();    // errors ne store karsu 

  $file_name = $_FILES['logo']['name'];
  $file_size = $_FILES['logo']['size'];
  $file_tmp = $_FILES['logo']['tmp_name'];
  $file_type = $_FILES['logo']['type'];
  $exp = explode('.', $file_name);
  $file_ext = end($exp); // Extension 6 file ma .pachi nu avse
  $extension = ["jpeg","jpg","png"]; //array 6 // extension api ave cheak karsu


  //extension 
  if(in_array($file_ext,$extension) === false){
    $errors[] = "This extension file not allowed, Please Choose a JPG or PNG file";
  } 

  //size apva
  if($file_size > 2097152){     //Bytes ma avse size 2mb api 6 cheak karva mate (1KB ma 1024bytes ave and 1 mb ma 1048576 bytes ave and 2mb ma 2097152 ) (1024 * 1024*2) = 2mb ni bytes
    $errors[] = "fiLE size must be 2MB or lower."; 
  }


  // error chek karva
  if(empty($errors) == true){
    move_uploaded_file($file_tmp, "images/".$file_name); // img upload karva 
  }else{
    print_r($errors);   // error ni print karvi hoy tao loop chlvi padse badhi error mate
    die();
  }
}

$sql = "UPDATE settings SET websitename = '{$_POST['website_name']}', logo = '{$file_name}', footerdesc='{$_POST['footer_desc']}'";
$result = mysqli_query($conn,$sql);

if($result){
  header("Location:$hostname/admin/settings.php");
}else{
  echo "Post are not Updated.:- " .mysqli_error($conn);
}
?>
