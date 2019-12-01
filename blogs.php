  <div id="blogs">
         
         <?php
         
          $stmt = $pdo->prepare('SELECT * FROM blogs');
            $stmt->execute(array());
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $data=$row['data'];
                $title=$row['title'];
                $content=$row['content'];
                $time=$row['day'];
                
                
                echo '<div class="b" id="'.$row['blog_id'].'"><h1>'.$title.'</h1>';
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $data ).'"/>';
                echo '<p>'.$content.'</p>';
                
                $userid=$row['user_id'];
                $stmt2 = $pdo->prepare('SELECT name FROM users WHERE user_id=:em');
                $stmt2->execute(array( ':em' => $userid));
                $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                
                echo 'blog by : <a href="'.$userid.'">'.$row2['name'].'</a>
                <span>'.$time.'</span>
                </div>';
                
                
            }
            
         
         ?>
     </div>    
     <div id="recent">
         <div id="r">Recent Blogs</div>
          <?php
         
          $stmt = $pdo->prepare('SELECT blog_id,title,day FROM blogs ORDER BY day DESC LIMIT 6 ');
            $stmt->execute(array());
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $title=$row['title'];                
                echo '<p class="rblog"><a href="#'.$row['blog_id'].'">'.$title.'</a><p>';   
            }
         ?>
         
     </div>
      
