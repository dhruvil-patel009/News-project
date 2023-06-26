<?php
  include "connection.php";

$page = basename($_SERVER['PHP_SELF']);

switch($page){
    case "single.php":
        if(isset($_GET['id'])){
            $sql_title = "SELECT * FROM post WHERE post_id = {$_GET['id']}";
            $result_title = mysqli_query($conn,$sql_title) or Die ("Query Failed single_titiel ." . mysqli_error($conn));
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title = $row_title['title'];
        }else{
            $page_title = "No Post Found";
        }
        break;
    case "category.php":
        if(isset($_GET['cid'])){
            $sql_title = "SELECT * FROM category WHERE category_id ={$_GET['cid']}";
            $result_title = mysqli_query($conn,$sql_title) or Die ("Query Failed category_title." .mysqli_error($conn));
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title =  $row_title['category_name'] ." "."News";
        }else{
            $page_title = "No Post Found";
        }
        break;
    case "author.php":
        if(isset($_GET['aid'])){
            $sql_title = "SELECT * FROM user WHERE user_id = {$_GET['aid']}";
            $result_titile = mysqli_query($conn,$sql_title) or Die ("Query Failed Author_title." .mysqli_error($conn));
            $row_title = mysqli_fetch_assoc($result_titile);
            $page_title = "News By ".$row_title['first_name'] ." ". $row_title['last_name'];       
        }else{
            $page_title ="No Post Found";
        }  
        break;
    case "search.php":
        if(isset($_GET['search'])){
            $page_title = $_GET['search'];       
        }else{
            $page_title ="No Post Found";
        }  
        break; 
    default:
        $page_title = "News Site";
        break;         
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $page_title;?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            
            <div class=" col-md-offset-4 col-md-4">
            <?php 
                        $sql = "SELECT * FROM settings";

                        $result = mysqli_query($conn,$sql) or Die("Query Failed. setting" .mysqli_error($conn));
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                    if($row['logo'] == ""){
                

                                        echo  '<a href="index.php"><h1>'.$row['websitename'].'</h1></a>';
                                    }else{
                                      echo  '<a href="index.php" ><img src="admin/images/'. $row['logo'].'"</a>';
                                    }            
                    }
                }
            ?>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            
            <?php 
                if(isset($_GET['cid'])){ // page set hase tao id batvse other wise nahi batve
                    $cat_id = $_GET['cid'];// url ma lidhi header ne highlight/active 6 ke nahi jova
                }

                $sql = "SELECT * FROM Category WHERE post > 0";  // post ni filed ma jo 0 karta moti hoy tao j query run thy 
                $result = mysqli_query($conn,$sql) or Die("Query Failed Category : - " .mysqli_error($conn));

                if(mysqli_num_rows($result) > 0){

                    $active = "";  // jo page select na hoy tao 
            ?>

                <ul class='menu' style="margin-top: -1.5em;">
                    <li><a href='<?php echo $hostname; ?>'>HOME</a></li>";

                    <?php 
                        while($row = mysqli_fetch_assoc($result)){
                            if(isset($_GET['cid'])){   // page a set 6 ke nahi te chek karse pachi active batvse
                            if($row['category_id'] == $cat_id){
                                $active = "active";
                            }else{
                                $active = "";
                            }
                        }
                            echo "<li><a class = '{$active}' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
                        }
                ?>
                </ul>
                <?php 
                    }
                ?>

            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
