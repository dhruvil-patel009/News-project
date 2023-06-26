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

                        $post_id = $_GET['id'];
                        $sql = "SELECT p.post_id,p.title,p.description,p.post_date,p.category,p.post_img,c.Category_id,
                                c.Category_name,u.user_id,u.username 
                                FROM post p 
                                LEFT JOIN category c ON p.category = c.Category_id
                                LEFT JOIN user u ON p.author = u.user_id  
                                WHERE p.post_id = $post_id";
                        
                        $result = mysqli_query($conn, $sql) or die("Query Failed. " .mysqli_error($conn));

                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <div class="post-content single-post">
                            <h3><?php echo $row['title'];?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href='category.php?cid=<?php echo $row['Category_id']?>'><?php echo $row['Category_name'];?></a>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?aid=<?php echo $row['user_id']?>'><?php echo $row['username'];?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['post_date'];?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin/upload/<?php echo $row['post_img'];?>" alt=""/>
                            <p class="description">
                            <?php echo $row['description'];?>
                            </p>
                        </div>
                        <?php 
                                }
                            }
                        ?>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'common/sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'common/footer.php'; ?>
