<?php 
include "common/header.php";
include "common/connection.php";


if($_SESSION['role'] == '0'){
    header ("Location: $hostname/admin/post.php");
}

if(isset($_POST['save']) == 'POST'){

    $Category = mysqli_real_escape_string($conn, $_POST['category_Name']);

    $sql = "SELECT category_name FROM category Where category_name = '$Category'";
    $result = mysqli_query($conn,$sql) or Die ("Query Failed : " . mysqli_error($conn));

    if(mysqli_num_rows($result) > 0){
        echo '<div class="alert alert-danger" role="alert"><b>Category Alerady Exists!</b></div>';
   }else{
       $sql1 = "INSERT INTO category(category_name) VALUES ('$Category')" or Die("Query Failed: ".mysqli_error($conn));
       
       if(mysqli_query($conn,$sql1)){
            header("Location:$hostname/admin/category.php");
       }else{
        echo '<div class="alert alert-danger" role="alert"><b>Query Failed '.mysqli_error($conn).'</b></div>';
       }  
     }

}
mysqli_close($conn);
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="category_Name" class="form-control" placeholder="category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
                 
              </div>
          </div>
      </div>
  </div>
  
<?php
    include "common/footer.php";
  ?>
