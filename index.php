<?php 
include 'common/header.php'; 
include 'common/connection.php'; 


?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                      
                <?php 

                    $limit = 3;
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }else{
                        $page = 1;
                    }
                    $offset = ($page - 1) * $limit;

                    $sql = "SELECT p.post_id,p.title,p.description,p.post_date,p.category,p.post_img,c.Category_id,c.Category_name,u.user_id,u.first_name,u.last_name,u.username 
                            FROM post p 
                            LEFT JOIN category c ON p.category = c.Category_id
                            LEFT JOIN user u ON p.author = u.user_id  
                            ORDER BY p.post_id DESC LIMIT {$offset},{$limit} ";
                      
                    $result = mysqli_query($conn, $sql) or die("Query Failed. " .mysqli_error($conn));

                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                  <a class="post-img" href="single.php?id=<?php echo $row['post_id'];?>"><img src="admin/upload/<?php echo $row['post_img'];?>" style="height: 100%;" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                  <div class="inner-content clearfix">
                                      <h3><a href='single.php?id=<?php echo $row['post_id'];?>'><?php echo $row['title'];?></a></h3>
                                      <div class="post-information">
                                          <span>
                                              <i class="fa fa-tags" aria-hidden="true"></i>
                                              <a href='category.php?cid=<?php echo $row['Category_id']?>'><?php echo $row['Category_name']; ?></a>
                                          </span>
                                          <span>
                                              <i class="fa fa-user" aria-hidden="true"></i>
                                              <a href='author.php?aid=<?php echo $row['user_id']?>'><?php echo ($row['first_name'].' '.$row['last_name']);?></a>
                                          </span>
                                          <span>
                                              <i class="fa fa-calendar" aria-hidden="true"></i>
                                              <?php echo $row['post_date'];?>
                                          </span>
                                      </div>
                                      <p class="description">
                                      <?php echo substr($row['description'],0,130).  "...";?>  <!--Sub str is string (1 is string ,start,end ) string ne short ma jova ketla thi ketla charcter ova te mate  ... continued-->

                                      </p>
                                      <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id'];?>'>read more</a>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                                }
                            }else{
                                echo "<h2>No Record Found!</h2>";
                            }
                            

                            // show pagination
                            $sql1 = "SELECT * FROM post";
                            $result1 = mysqli_query($conn, $sql1) or Die("Query Failed." .mysqli_error($conn));

                            if(mysqli_num_rows($result1)){

                                $total_records = mysqli_num_rows($result1);
                                
                                $total_page = ceil($total_records / $limit);

                                echo '<ul class="pagination admin-pagination">';
                                
                                if($page > 1){
                                    echo '<li><a href = "index.php?page='.($page-1).'">Prev</a></li>';
                                }
                                
                                
                                for($i = 1; $i <= $total_page; $i++){
                                    if($i == $page){
                                        $active = "active";
                                    }else{
                                        $active = "";
                                    }
                                    echo '<li class = "'.$active.'"><a href = "index.php?page='.$i.'">'.$i.'</a></li>';   // url ma superglobal variable get thi page number lese

                                }
                                if($total_page > $page){
                                    echo '<li><a href = "index.php?page='.($page + 1).'">Next</a></li>';
                                }
                                echo '</ul>';
                            }
                        ?>
                    
                        
                        
                    </div><!-- /post-container -->
                </div>
                <?php include 'common/sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'common/footer.php'; ?>
