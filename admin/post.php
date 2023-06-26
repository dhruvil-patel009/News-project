<?php 
include "common/connection.php";
include "common/header.php";

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
              <?php 

                    $limit = 3;
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }else{
                        $page = 1;
                    }
                    $offset = ($page - 1) * $limit; 

                    if($_SESSION['role'] == '1'){
                        $sql = "SELECT * FROM post 
                        LEFT JOIN category ON post.category = category.category_id
                        LEFT JOIN user ON post.author = user.user_id
                        ORDER BY post.post_id DESC LIMIT {$offset},{$limit} ";   // $ jode {} no use karvo
                    }elseif($_SESSION['role'] == '0'){
                        $sql = "SELECT p.post_id,p.title,p.description,p.post_date,p.category,c.category_name, u.username 
                        FROM post p 
                        LEFT JOIN category c ON p.category = c.category_id
                        LEFT JOIN user u ON p.author = u.user_id
                        WHERE p.author = {$_SESSION['userid']}   
                        ORDER BY p.post_id DESC LIMIT {$offset},{$limit} ";
                    }   
                    $result = mysqli_query($conn, $sql) or die("Query Failed. " .mysqli_error($conn));

                    if(mysqli_num_rows($result) > 0){

                    ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th> 
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                            <?php 
                            $serial = $offset + 1;
                                while($row = mysqli_fetch_assoc($result)){
                                
                            ?>    
                                 
                          <tr>
                              <td class='id'><?php echo $serial;?></td>
                              <td><?php echo $row['title'];?></td>
                              <td><?php echo $row['category_name'];?></td>
                              <td><?php echo $row['post_date'];?></td>
                              <td><?php echo $row['username'];?></td>
                              <td class='edit'><a href='update-post.php?id=<?php echo $row['post_id']; ?>'<i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php?id=<?php echo $row['post_id']; ?>&catid=<?php echo $row['category']; ?>'<i class='fa fa-trash-o'></i></a></td>
                              <!-- 2 table na data delete karva ma te & nu use karyo -->
                          </tr>
                          <?php 
                               $serial++;
                             }
                            ?>
                      </tbody>
                  </table>
                  

                  <?php 
                    } //  if nu closing
                    

                    $sql1 = "SELECT * FROM post";
                    $result1 = mysqli_query($conn, $sql1) or Die("Query Failed." .mysqli_error($conn));

                    if(mysqli_num_rows($result1)){

                        $total_records = mysqli_num_rows($result1);
                        
                        $total_page = ceil($total_records / $limit);

                        echo '<ul class="pagination admin-pagination">';
                        
                        if($page > 1){
                            echo '<li><a href = "post.php?page='.($page-1).'">Prev</a></li>';
                        }
                        
                        
                        for($i = 1; $i <= $total_page; $i++){
                            if($i == $page){
                                $active = "active";
                            }else{
                                $active = "";
                            }
                            echo '<li class = "'.$active.'"><a href = "post.php?page='.$i.'">'.$i.'</a></li>';   // url ma superglobal variable get thi page number lese

                        }
                        if($total_page > $page){
                            echo '<li><a href = "post.php?page='.($page + 1).'">Next</a></li>';
                        }
                        echo '</ul>';
                    }
                ?>
                  

                 
            
              </div>
          </div>
      </div>
  </div>
<?php include "common/footer.php"; ?>
