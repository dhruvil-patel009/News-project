<?php 

include 'common/connection.php';

session_start();

session_unset();
session_destroy();

header("Location:$hostname/admin/");
// header("Location:$hostname/admin/users.php");
?>