<?php
require_once "pdo.php";
session_start();
if(!isset($_SESSION['user_id'])){
    echo '<script language="javascript">';
    echo 'alert("Not logged in");';
    echo 'window.location.href = "index.php";';
    echo '</script>'; 
}
 ?>


<!DOCTYPE html>
<html>
  <?php require_once 'header.php'; ?>
<style>
body  {
  background-image: url("images/bg3.jpg");
   background-repeat: repeat;
  background-size: 1350px 700px;
}
</style>
  <body>
    <?php
      require_once 'nav.php';
      require_once 'blogs.php';

    ?>      
    </body>
</html>
