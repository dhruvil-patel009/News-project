<?php
  include 'common/connection.php';


  $post_id = $_GET['id'];
  $cat_id = $_GET['catid'];

  $sql1 = "SELECT * FROM post WHERE post_id = {$post_id}";
  $result1 = mysqli_query($conn,$sql1) or Die("Query Failed".mysqli_error($conn));
  $row = mysqli_fetch_assoc($result1);

  unlink("upload/".$row['post_img']);  // unlink use folder ma thi koi file delte karva

 
  $sql = "DELETE FROM post WHERE post_id = {$post_id};";
  $sql .="UPDATE category SET post = post-1 WHERE Category_id = {$cat_id}";
  if(mysqli_multi_query($conn,$sql)){
      header("Location:$hostname/admin/post.php");
  }else{
    echo '<div class="alert alert-danger" role="alert"><b>Can not Delete Record '.mysqli_error($conn).'</b></div>';
  }
?>
