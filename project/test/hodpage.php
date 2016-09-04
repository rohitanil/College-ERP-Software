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
          <li class="selected"><a href="hodpage.php">HOME</a></li>
          <li><a href="#">STUDENT</a></li>
          <li><a href="#">ATTENDENCE</a></li>
          
          <li><a href="#">CONTROL</a>
            <ul>
            <li><a href="#">Department</a>
              <ul>
              <li><a href="setstaffadvisorpage.php">Staff Advisor</a></li>
              <li><a href="#">Subjects</a>
              <ul>
              <li><a href="hod_addsubpage.php">Add Subjects</a></li>
              <li><a href="demo1.php">Assign Teacher</a></li>
              </ul>
              </li>
              <li><a href="#">View</a>
              	  <ul>
              <li><a href="hod_view.php">Subject List</a></li>
              <li><a href="hod_view.php">Teacher List</a></li>
              </ul>
              </li>
             
              </ul>
              </li>
              <li><a href="#">Timetable</a>
              <ul>
              <li><a href="timetable.php">Set</a></li>
              <li><a href="viewtimetablepage.php">View</a></li>
             
              </ul>
              </li>
              <li><a href="#">Daily Course Work</a>
              <ul>
                 <li><a href="#">View</a></li>
                  
              </ul>
              </li>
              <li><a href="#">Assignment</a>
              <ul>
                 <li><a href="#">View</a></li>
                
              </ul>
             </li> 
            </ul>
          </li>
          <li><a href="logout.php">LOGOUT</a></li>
          
        </ul>
      </nav>
    </header>
    <div id="site_content">
      <div class="gallery">
        <ul class="images">
          <li class="show"><img src="images/50DAYS.png" width="960" height="527"></li>
          <li><img src="images/3.jpg" width="960" height="527"></li>
           <li><img src="images/1.jpg" width="960" height="540"></li>
         
        </ul>
      </div>
      <div id="sidebar_container">
        <div class="sidebar">
          <h3>Latest News</h3>
          
        </div>
        
      </div>
      <div class="content">
       
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
