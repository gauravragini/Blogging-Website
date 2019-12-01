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
      <?php require_once 'header.php'; ?>
    <body id="body">

         <!--background particles -->   
        <div id="particle-container">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
             <div class="particle"></div>
        </div>

        <div id="1">
            <span id="s">B S </span>

            <?php
               if(!isset($_SESSION['name']))
                  {
                      echo '<a href="#myModalLogin" class="button3 log" data-toggle="modal">Log in </a>';          
                      echo '<a href="#myModalSignup" class="button3 sign" data-toggle="modal"> Sign in</a>';
                  }
            ?>
        </div>


        <div id="heading">BLOG SPACE</div>
        <div id ="section1">
            <img src="images/1.png" >
            <div id="right">
            <p>Easy to Create</p>
            <p>Write about anything</p>
            <p>Get Connected</p>
            <p>Share </p>
            <p >Be creative</p>
            </div>
            <div><a  class="move" href="#section2"><i class="fa fa-angle-double-down "></i></a></div>
            
        </div>
        
        <div id="section2">
            <div><a class="move" href="#1"><i class="fa fa-angle-double-up"></i></a></div>
            <h1>Share your Passion</h1>
            <h3>with the world</h3>
            <div class="img_card">
                <img src="images/p1.jpg">
                <p class="desc">Sports</p>
            </div>
            <div class="img_card h">
                <img src="images/p2.jpg">
                <p class="desc">Photography</p>
            </div>
            <div class="img_card h">
                <img src="images/p3.jpeg">
                <p class="desc">Technology</p>
                </div>
            <div class="img_card">
                <img src="images/p4.jpg">
                <p class="desc">DIY</p>
            </div>
            <div class="img_card h">
                <img src="images/p5.jpg">
                <p class="desc">Travel</p>
            </div>
            <div class="img_card">
                <img src="images/p6.jpg">
                <p class="desc">Fashion</p>
            </div>
            <div class="img_card">
                <img src="images/p7.jpg">
                <p class="desc">Food</p>
            </div>
            <div class="img_card h">
                <img src="images/p8.jpg">
                <p class="desc">LifeStyle</p>
            </div>
            <div class="img_card">
                <img src="images/p9.jpeg">
                <p class="desc">Literature</p>
            </div>
            <div class="img_card h">
                <img src="images/p10.jpg">
                <p class="desc">Music</p>
            </div>
            <div class="img_card">
                <img src="images/p11.jpg">
                <p class="desc">Fitness</p>
            </div>
            <div class="img_card">
                <img src="images/p12.jpg">
                <p class="desc">And Many More</p>
            </div>
            <div><a class="move" href="#section3"><i class="fa fa-angle-double-down"></i></a></div>
            
        </div>
        
        <div id="section3">
            <div><a class="move" href="#section2"><i class="fa fa-angle-double-up"></i></a></div>
            <h1>Some of our Best Blogs</h1>
            <h3>to be read</h3>
            <div class="bestdiv ">
                <img src="images/best1.jpg" class="bestimage"> <p>Lectus arcu bibendum at varius vel<p>
                <div class="overlay">
                     <div class="text">Egestas erat imperdiet sed euismod nisi porta lorem mollis aliquam. Molestie a iaculis at erat pellentesque.  At lectus urna duis convallis convallis tellus id. Tortor dignissim convallis aenean et tortor at risus. Est lorem ipsum dolor sit amet consectetur.<a href="#myModalSignup"  data-toggle="modal">Read more</a></div>
                </div>
            </div>
            <div class="bestdiv h">
                <img src="images/best2.jpg" class="bestimage"> <p>Lectus arcu bibendum at varius vel<p>
                <div class="overlay">
                     <div class="text">Egestas erat imperdiet sed euismod nisi porta lorem mollis aliquam. Molestie a iaculis at erat pellentesque. Lectus sit amet est placerat in egestas erat.  Tortor dignissim convallis aenean et tortor at risus. Est lorem ipsum dolor sit amet consectetur.
                    <a href="#myModalSignup"  data-toggle="modal">Read more</a></div>
                </div>
            </div>
            <div class="bestdiv h ">
                <img src="images/best3.jpg" class="bestimage"> <p>Lectus arcu bibendum at varius vel<p>
                <div class="overlay">
                     <div class="text"> Lectus sit amet est placerat in egestas erat. Magna etiam tempor orci eu lobortis elementum. At lectus urna duis convallis convallis tellus id. Tortor dignissim convallis aenean et tortor at risus. Est lorem ipsum dolor sit amet consectetur.
                    <a href="#myModalSignup"  data-toggle="modal">Read more</a></div>
                </div>
            </div>
            <div class="bestdiv">
                <img src="images/best4.jpg" class="bestimage"> <p>Lectus arcu bibendum at varius vel<p>
                <div class="overlay">
                     <div class="text">Egestas erat imperdiet sed euismod nisi porta lorem mollis aliquam. Mole Tortor dignissim convallis aenean et tortor at risus. Est lorem ipsum dolor sit amet consectetur.
                     <a href="#myModalSignup"  data-toggle="modal">Read more</a>
                     </div>
                </div>
            </div>
             <div class="bestdiv h">
                <img src="images/best2.jpg" class="bestimage"> <p>Lectus arcu bibendum at varius vel<p>
                <div class="overlay">
                     <div class="text">Egestas erat imperdiet sed euismod nisi porta lorem mollis aliquam. Molestie a iaculis at erat pellentesque. Lectus sit amet est placerat in egestas erat.  Tortor dignissim convallis aenean et tortor at risus. Est lorem ipsum dolor sit amet consectetur.
                    <a href="#myModalSignup"  data-toggle="modal">Read more</a></div>
                </div>
            </div>
            <div class="bestdiv">
                <img src="images/best3.jpg" class="bestimage"> <p>Lectus arcu bibendum at varius vel<p>
                <div class="overlay">
                     <div class="text"> Lectus sit amet est placerat in egestas erat. Magna etiam tempor orci eu lobortis elementum. At lectus urna duis convallis convallis tellus id. Tortor dignissim convallis aenean et tortor at risus. Est lorem ipsum dolor sit amet consectetur.
                    <a href="#myModalSignup"  data-toggle="modal">Read more</a></div>
                </div>
            </div>
            <div class="bestdiv">
                <img src="images/best4.jpg" class="bestimage"> <p>Lectus arcu bibendum at varius vel<p>
                <div class="overlay">
                     <div class="text">Egestas erat imperdiet sed euismod nisi porta lorem mollis aliquam. Mole Tortor dignissim convallis aenean et tortor at risus. Est lorem ipsum dolor sit amet consectetur.
                     <a href="#myModalSignup"  data-toggle="modal">Read more</a>
                     </div>
                </div>
            </div>
            <div><a class="move" href="#section4"><i class="fa fa-angle-double-down"></i></a></div>
            
        </div>

        <div id="section4">
            <div><a  class="move" href="#section3"><i class="fa fa-angle-double-up "></i></a></div>
            <h1>Our Best Bloggers</h1>

        <div class="card">
          <img src="images/blogger1.jpg" alt="John" style="width:100%">
          <h3>John Doe</h3>
          <p class="title">Fashion Designer, Example</p>
          <p>Hsfsdgsdg University</p>
          <div style="margin: 24px 0;">
            <a href="#"><i class="fa fa-dribbble"></i></a> 
            <a href="#"><i class="fa fa-twitter"></i></a>  
            <a href="#"><i class="fa fa-linkedin"></i></a>  
            <a href="#"><i class="fa fa-facebook"></i></a> 
          </div>
        </div>        <div class="card">
          <img src="images/blogger2.jpg" alt="John" style="width:100%">
          <h3>Annsn Fhdse</h3>
          <p class="title">Traveller, Example</p>
          <p>dfghdfhtdf dfhdfgh hfgh</p>
          <div style="margin: 24px 0;">
            <a href="#"><i class="fa fa-dribbble"></i></a> 
            <a href="#"><i class="fa fa-twitter"></i></a>  
            <a href="#"><i class="fa fa-linkedin"></i></a>  
            <a href="#"><i class="fa fa-facebook"></i></a> 
          </div>
        </div>
        <div class="card">
          <img src="images/blogger3.jpg" alt="John" style="width:100%">
          <h3>Johdfsn Kogde</h3>
          <p class="title">CEO & Founder, Example</p>
          <p>Harvard University</p>
          <div style="margin: 24px 0;">
            <a href="#"><i class="fa fa-dribbble"></i></a> 
            <a href="#"><i class="fa fa-twitter"></i></a>  
            <a href="#"><i class="fa fa-linkedin"></i></a>  
            <a href="#"><i class="fa fa-facebook"></i></a> 
          </div>
        </div>
        <div class="card">
          <img src="images/blogger4.jpg" alt="John" style="width:100%">
          <h3>Mdfohn Dosfe</h3>
          <p class="title">sfhbgxcdfgdhb fdh</p>
          <p>Harvard University</p>
          <div style="margin: 24px 0;">
            <a href="#"><i class="fa fa-dribbble"></i></a> 
            <a href="#"><i class="fa fa-twitter"></i></a>  
            <a href="#"><i class="fa fa-linkedin"></i></a>  
            <a href="#"><i class="fa fa-facebook"></i></a> 
          </div>
        </div>
            
        </div>

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

        
        <footer>
            <p>Need Help ?  <a href="mailto:ragini.09rag@gmail.com">Mail Us </a>
            <i class="fa fa-envelope"></i>
            </p>
        </footer>

    </body>
    
</html>
