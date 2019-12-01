<?php   require_once "pdo.php";
        session_start();
        $salt = 'XyZzy12*_';

       //for login
        if ( isset($_POST['email']) && isset($_POST['pass']) ) {
            $check = hash('md5', $salt.$_POST['pass']);
            $stmt = $pdo->prepare('SELECT user_id,name FROM users WHERE email = :em AND pass = :pw');
            $stmt->execute(array( ':em' => $_POST['email'], ':pw' => $check));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ( $row !== false ) {
              $_SESSION['name'] = $row['name'];
              $_SESSION['user_id'] = $row['user_id'];
              header("Location: home.php");
              return;}
            else{
              error_log("Login fail ".$_POST['email']." $check");
              echo '<script language="javascript">';
              echo 'alert("incorrect email id or password")';
              echo '</script>';     
            }

        }

   //for sign up
if ( isset($_POST['mail']) ) {
       $pass = hash('md5', $salt.$_POST['password']);
       $stmt = $pdo->prepare('INSERT INTO users(name,email,pass,phone,profession,gender) Values(:n, :e, :p, :ph, :pf, :g)');
       $stmt->execute(array( 
           ':n' => $_POST['username'] ,
           ':e' => $_POST['mail'],
           ':p' =>$pass, 
           ':ph'=>$_POST['phone'], 
           ':pf'=>$_POST['profession'],
           ':g'=>$_POST['gender'] 
       ));
    
    $stmt = $pdo->prepare('SELECT user_id,name FROM users WHERE email = :em AND pass = :pw');
    $stmt->execute(array( ':em' => $_POST['mail'], ':pw' => $pass));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['name'] = $row['name'];
    $_SESSION['user_id'] = $row['user_id'];
    header("Location: home.php");
              
    
}

?>


<!DOCTYPE html>
<html>
    <body id="body">
           <!-- login  Modal HTML -->
        <div id="myModalLogin" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="avatar">
                            <i class="fa fa-user " aria-hidden="true"></i>
                        </div>				
                        <h4 class="modal-title">Member Login</h4>	
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form  method="post" name="login">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="nam" placeholder="Username" required="required">		
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="pass" id="id_1723" placeholder="Password" required="required">	
                            </div>        
                            <div class="form-group button2">
                                <button type="submit" class="btn btn-primary btn-lg  login-btn">Login</button>
                                <button type="reset" class="btn btn-primary btn-lg  login-btn">Clear</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#">Forgot Password?</a>
                    </div>
                </div>
            </div>
        </div> 


        <!--modal for sign up-->
        <div id="myModalSignup" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="avatar">
                            <i class="fa fa-user " aria-hidden="true"></i>
                        </div>				
                        <h4 class="modal-title">Create an Account</h4>	
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form  method="post" name="signin">
                            <div class="form-group">
                                <label for="nam">Name : </label>
                                <input type="text" class="form-control" name="username" id="nam" placeholder="Ragini Gaurav" required="required">		
                            </div>
                            <div class="form-group">
                                <label for="email">Email : </label>
                                <input type="text" class="form-control" name="mail" id="email" placeholder="abc@xyz" required="required">		
                            </div>
                            <div class="form-group">
                                <label for="phone">Contact Number : </label>
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="1234567890" >		
                            </div>
                             <div class="form-group">
                                <label>Gender : </label><br>
                                 <input type="radio" name="gender" value="Male" >&nbsp;Male&nbsp;&nbsp;
                                <input type="radio" name="gender" value="Female" >&nbsp;Female&nbsp;&nbsp;
                                <input type="radio" name="gender" value="O" >&nbsp;Other
                            </div>
                            <div class="form-group">
                                <label for="prof">Profession : </label>
                                <input type="text" class="form-control" name="profession" id="prof" placeholder="Student etc" >		
                            </div>
                            <div class="form-group">
                                <label for="pass">Password : </label>
                                <input type="password" class="form-control" name="password" id="pass" placeholder="Xy_12gK99" required="required">		
                            </div>  
                            <div class="form-group button2">
                                <button type="submit" class="btn btn-primary btn-lg  login-btn">Sign in</button>
                                <button type="reset" class="btn btn-primary btn-lg  login-btn">Clear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 

    </body>
</html>
