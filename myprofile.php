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
    $stmt = $pdo->prepare('DELETE FROM users where user_id=:uid');
    $stmt->execute(array(
        ':uid' => $_SESSION['user_id'])); 
    echo '<script language="javascript">';
    echo 'alert("Account Successfully deleted");';
    echo 'window.location.href = "index.php";';
    echo '</script>'; 

}
/*
if(isset($_POST['update']))
{
    
       $stmt = $pdo->prepare('UPDATE users data=:d WHERE user_id=:uid');
       $stmt->execute(array( 
           ':uid' => $_SESSION['user_id'],
           ':n'=>$_FILES["image"]["name"], 
           ':d'=>file_get_contents($_FILES['image']['tmp_name'])
          
       ));
}*/
?>


<!DOCTYPE html>
<html>
  <?php require_once 'header.php'; ?>
            <style>
body  {
  background-image: url("images/g1.gif");
   background-repeat: no-repeat;
  background-size: 1900px 700px;
}
</style>
  <body>
    <?php
        require_once 'nav.php';
    ?>
      <h1 id="h1">MY PROFILE</h1>
   <div id="myprof">
         
         <?php
         
          $stmt = $pdo->prepare('SELECT * FROM users where user_id=:uid');
            $stmt->execute(array( ':uid' => $_SESSION['user_id']));
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $name=$row['name'];
                $email=$row['email'];
                $password=$row['pass'];
                $phone=$row['phone'];
                $profession=$row['profession'];
                $data=$row['data'];
                $about=$row['about'];
                $gender=$row['gender'];
                
                echo '<img id="profpic" src="data:image/jpeg;base64,'.base64_encode( $data ).'"/>';
                echo '<h1>'.$name.'</h1>';
                echo '<p>'.$email.'</p>';
               // echo '<p>'.$password.'</p>';
                echo '<p>'.$phone.'</p>';
                echo '<p>'.$profession.'</p>';
               
                echo '<p>'.$gender.'</p>';
                echo '<p>'.$about.'</p>';
               
                
               /* echo '<form method="post">';
                echo '<input type="file" name="image" id="upFile" accept=".png,.gif,.jpg,.webp" required>';
                echo '<input type="submit" name="update" value="Add Profile Picture"></form>';*/
                
                
                 echo '<form method="post">';
                echo '<input type="submit" name="delete" value="Delete Account"></form>';
            }
   
         ?>
       </div>
    </body>
</html>
