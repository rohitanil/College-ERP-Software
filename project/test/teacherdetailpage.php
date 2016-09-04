
<?php
session_start();
if(!isset($_SESSION['user'] ))
{
  header("Location: index.html");
}
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>SCT ASSISTANT</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>


</head>

<body>
  

      </nav>    <div id="site_content">
      
      <div class="content">
       
        
      
        <h2>Enter your details</h2>
        <form action="teacherdetail.php" method="post" enctype="multipart/form-data">
          <div class="form_settings">
             
            
              
            <p><span><strong>CONTACT</strong></span><input type="text" name="contact" maxlength="10" value="" /></p>
            
            <p><span><strong>EMAIL ID</strong></span><input type="text" name="emailid" value="" /></p>
            <p><span><strong>NEW PASSWORD</strong></span><input type="password" name="newpass" placeholder="New Password"></p>
            
            <p><span><strong>CONFIRM PASSWORD</strong></span><input type="password" name="confirmpass" placeholder="Confirm Password"></p>
            
            <p><span><strong>ADDRESS</strong></span><textarea rows="8" cols="50" name="address"></textarea></p>
            <p><span><strong>PUBLICATIONS</strong></span><textarea rows="12" cols="50" name="publication"></textarea></p>
          
            
    
            
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="submit" value="SUBMIT" /></p>
          </div>
        </form>
      </div>
    </div>
    <footer>
     <p>Copyright &copy; SCT ASSISTANT| designed by Rohit and Jawad</a></p>
    </footer>
  </div>
  <p>&nbsp;</p>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript" src="js/image_fade.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {

      $('ul.sf-menu').sooperfish();
    });
  </script>
</body>
</html>
