<?php
session_start();
if(!isset($_SESSION['user'] ))
{
	header("Location: login.html");
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
  <div id="main">
    <header>
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1>SCT ASSISTANT</h1>

         
        </div>
      </div>
      <nav>
        <ul class="sf-menu" id="nav">
          <li class="selected"><a href="adminhomepage.php">HOME</a></li>
          
          <li><a href="#">ATTENDENCE</a></li>
          
          <li><a href="#">CONTROL</a>
            <ul>
            <li><a href="#">Teacher</a>
              <ul>
              <li><a href="admin_addteacherpage.php">Add Teacher</a></li>
              <li><a href="admin_deleteteacherpage.php">Delete Teacher</a>
                
              </li>
              <li><a href="admin_viewteacherpage.php">Teacher List</a></li>
              
              </ul>
              </li>
              <li><a href="#">Student</a>
                <ul>
              <li><a href="admin_searchstudpage.php">Search</a></li>
              <li><a href="#">Sessionals</a>
                
              </li>
              <li><a href="admin_getstudentlist.php"><strong>Get Student List</strong></a>
                
              </li>
              
              </ul>
              </li>

            </ul>
          </li>
          <li><a href="update.php">UPDATE</a></li>
          <li><a href="logout.php">LOGOUT</a></li>
          
        </ul>
      </nav>
    </header>
    <div id="site_content">
      <div class="gallery">
        <ul class="images">
          <li class="show"><img src="images/50DAYS.png" width="960" height="527"></li>
          <li><img src="images/FB_IMG_1436462311944.jpg" width="960" height="527"></li>
           <li><img src="images/11011456_787326061342573_8274311906941130285_n.jpg" width="960" height="540"></li>
         
        </ul>
      </div>

      
          <br><h4>Important</h4>
          <br>
          <p><strong>Click 'UPDATE' before the admission of first year students</strong></p>
          <p><strong>Click 'Get Student List' after admission of first years and updation of the database</strong></p>
          <p><strong>Go to CONTROL ->Get Student List to insert students into appropriate class lists</strong></p>
         
        
   <div>   
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
