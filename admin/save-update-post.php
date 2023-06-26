<?php
include 'common/connection.php';

if(empty($_FILES['new-image']['name'])){
    $image_name = $_POST['old_image'];
}else{
  $errors = array();    // errors ne store karsu 

  $file_name = $_FILES['new-image']['name'];
  $file_size = $_FILES['new-image']['size'];
  $file_tmp = $_FILES['new-image']['tmp_name'];
  $file_type = $_FILES['new-image']['type'];
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

$sql = "UPDATE post SET title = '{$_POST['post_title']}', description = '{$_POST['postdesc']}', category={$_POST['category']},post_img='{$image_name}'
        WHERE post_id = '{$_POST['post_id']}';";
if($_POST['old-category'] != $_POST['category']){   // CAtegory table ne update karva       
    $sql .="UPDATE category SET post = post - 1 WHERE category_id = {$_POST['old_category']};";        
    $sql .="UPDATE category SET post = post + 1 WHERE category_id = {$_POST['category']}";        
}
$result = mysqli_multi_query($conn,$sql);

if($result){
  header("Location:$hostname/admin/post.php");
}else{
  echo "Post are not Updated.:- " .mysqli_error($conn);
}
?>
