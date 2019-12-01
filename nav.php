     <nav class="navbar navbar-inverse navbar-global navbar-fixed-top" id="topbar">
        <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="home.php">Blog Space</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-user navbar-right">
            <li><a href="myprofile.php"><span class="glyphicon glyphicon-user">&nbsp;</span><?php echo $_SESSION['name']; ?></a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
     <nav class="navbar-primary">
          <a href="#" class="btn-expand-collapse"><span class="glyphicon glyphicon-menu-left"></span></a>
          <div class="navbar-primary-menu">
              <a href="home.php" class="active"><span class="glyphicon glyphicon-list-alt"></span><span class="nav-label">View Blogs</span></a>
              <a href="write.php"><span class="glyphicon glyphicon-pencil"></span><span class="nav-label">Write a Blog</span></a>
              <a href="myprofile.php"><span class="glyphicon glyphicon-user"></span><span class="nav-label">My Profile</span></a>
              <a href="myblog.php"><span class="glyphicon glyphicon-th-list"></span><span class="nav-label">My Blogs</span></a>
             <!-- <a href="#"><span class="glyphicon glyphicon-cog"></span><span class="nav-label">Settings</span></a>-->
            </div>
        </nav>
  <script>
            $('.btn-expand-collapse').click(function(e) {
				$('.navbar-primary').toggleClass('collapsed');
              });
            
        </script>