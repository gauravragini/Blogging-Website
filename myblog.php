<?php
require_once "pdo.php";
session_start();
if(!isset($_SESSION['user_id'])){
    echo '<script language="javascript">';
    echo 'alert("Not logged in");';
    echo 'window.location.href = "index.php";';

    echo '</script>'; 

}
if(isset($_POST['delete']))
{
    $stmt = $pdo->prepare('DELETE FROM blogs where blog_id=:bid');
    $stmt->execute(array(
        ':bid' => $_POST['blog_id']));  
}
 ?>

<!DOCTYPE html>
<html>
  <?php require_once 'header.php'; ?>
            <style>
body  {
  background-image: url("images/g5.jpg");
   background-repeat: repeat;
  
}
</style>
  <body>
    <?php
        require_once 'nav.php';
    ?>
      
   <div id="blogs">
         <h1 id="h1">MY BLOGS</h1>
         <?php
         
          $stmt = $pdo->prepare('SELECT * FROM blogs where user_id=:uid');
            $stmt->execute(array( ':uid' => $_SESSION['user_id']));
           
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                
                $data=$row['data'];
                $title=$row['title'];
                $content=$row['content'];
                $time=$row['day'];
                
                
                echo '<div class="b" id="'.$row['blog_id'].'"><h1>'.$title.'</h1>';
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $data ).'"/>';
                echo '<p>'.$content.'</p>';
                echo '<form method="post">
                <input type="hidden" value=';
                echo ''.$row['blog_id'].' name="blog_id">
                <input type="submit" name="delete" value="delete"></form></div>';
            }
   
         ?>
       </div>
      <img src="images/g5.png"/>
    </body>
</html>
