<?php
require_once "pdo.php";
session_start();
if(!isset($_SESSION['user_id'])){
    echo '<script language="javascript">';
    echo 'alert("Not logged in");';
    echo 'window.location.href = "index.php";';
    echo '</script>'; 
    return;

}



if(isset($_POST['content']))
   {
    
    if ($_FILES['image']['size']==0) { die("No file selected"); }
    if (exif_imagetype($_FILES['image']['tmp_name'])===false) { die("Not an image"); }

       
       $stmt = $pdo->prepare('INSERT INTO blogs(user_id,heading,title,content,tag,name,data) Values(:u, :h, :t, :c, :ta,:n,:d)');
       $stmt->execute(array( 
           ':u' => $_SESSION['user_id'],
           ':h' =>$_POST['heading'],
           ':t' =>$_POST['title'], 
           ':c'=>$_POST['content'], 
           ':ta'=>$_POST['tag'],
           ':n'=>$_FILES["image"]["name"], ':d'=>file_get_contents($_FILES['image']['tmp_name'])
          
       ));
    echo '<script language="javascript">';
    echo 'alert("sucessfully posted");';
    echo 'window.location= "home.php"';
    echo '</script>'; 
  
   }
 ?>


<!DOCTYPE html>
<html>
    <head>
  <?php require_once 'header.php'; ?>
        <style>
body  {
  background-image: url("images/bg2.jpg");
   background-repeat: no-repeat;
  background-size: 1350px 700px;
}
</style>
    </head>
  <body >
    <?php
        require_once 'nav.php';
    ?>
      <h1 id="h1">WRITE YOUR BLOG</h1>
    <div id="form" >
        <form id="write" method="post" action="write.php" enctype="multipart/form-data">
            <div id="left">
            <p>Title <input type="text" name="title"></p>
            <p>Heading <input type="text" name="heading"></p>
            <p>Tag <input type="text" name="tag"></p>
            <p>    <input type="file" name="image" id="upFile" accept=".png,.gif,.jpg,.webp" required>
             </p>
            </div>
            <div id="right">
           
            <textarea rows = "10" cols = "50" name = "content">
            </textarea><br>
            <div id="bottom">
            <input type="reset" value="Clear"> 
            <input type="submit" value="Post">
             </div>
            </div>
             
        </form>
      </div>


        
    </body>
</html>
