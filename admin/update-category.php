<?php 
include "common/header.php";
include "common/connection.php";

if($_SESSION['role'] == '0'){
    header ("Location: $hostname/admin/post.php");
}

if (isset($_POST['submit']) == 'POST') {

  $Category_id = mysqli_real_escape_string($conn, $_POST['cat_id']);
  $Category = mysqli_real_escape_string($conn, $_POST['category_Name']);
  
 
  $sql ="UPDATE category SET category_name = '$Category' WHERE category_id = '$Category_id'";
  
  if(mysqli_query($conn,$sql)){    
      header("Location:$hostname/admin/category.php");
  }else{
      die("The Data is not Updated Successfuly".mysqli_error($conn));
  }
  

}

?>

  <div id="admin-content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <h1 class="adin-heading">Update Category</h1>
        </div>
        <div class="col-md-offset-3 col-md-6">
        
              <?php
                    $cat_id = $_GET['id'];

                    $sql = "SELECT * From category WHERE category_id= '$cat_id'";
                    $result = mysqli_query($conn, $sql) or die('Query Failed.' . mysqli_error($conn));

                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                ?>
              <!-- Form Start -->
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                  <div class="form-group">
                      <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id'];?>">
                  </div>
                  <div class="form-group">
                      <label>category Name</label>
                      <input type="text" name="category_Name" class="form-control" value="<?php echo $row['category_name'];?>"  placeholder="" required>
                  </div>
                  <input type="submit" name="submit" class="btn btn-primary" value="Update" />
              </form>
               <!-- Form End-->
              
                        <?php
                      }
                      }?>
        </div>
      </div>
    </div>
  </div>
<?php include "common/footer.php"; ?>
