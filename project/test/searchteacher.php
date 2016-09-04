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
          
        </div>
      </div>
      <nav>
        <ul class="sf-menu" id="nav">
          
              <li><a href="adminhomepage.php">HOME</a></li>
          
          <li><a href="#">ATTENDENCE</a></li>
         
          <li><a href="#">CONTROL</a>
             <ul>
            <li><a href="#">Teacher</a>
              <ul>
              <li><a href="admin_addteacherpage.php">Add Teacher</a></li>
              <li><a href="admin_deleteteacherpage.php">Delete Teacher</a>
                
              </li>
              <li class="selected"><a href="admin_viewteacherpage.php">Teacher List</a></li>
              <li><a href="#">Edit</a></li>
              </ul>
              </li>
              <li><a href="#">Student</a></li>
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
      
      <div class="content">
       
        
        
        <p><strong>TEACHER DETAILS</strong></p>
        <table style="width:100%; border-spacing:0;">
         
          
          <?php
          $search=$_POST['search'];
          $con1=mysqli_connect('localhost','root','','sampledata');
          if(!$con1)
			  {
				echo"connection failed";
				exit();
			   }
			  else
			 {	mysqli_select_db($con1,"teacher");
			
    $result=mysqli_query($con1,"SELECT username,dept,address,mob_no,mail_id,publications FROM teacher WHERE username='$search'");
   if(!$result)
   {
   printf("Error %s",mysqli_error($con1));
      exit();
   }
   ?>
			
			  <?php while ($row=mysqli_fetch_assoc($result))
			 {
			 ?>
             <tr><th>NAME</th><td><?php echo $row["username"];?> </td></tr>
             <tr><th>DEPARTMENT</th><td><?php echo $row["dept"];?> </td></tr>
             
             
             <tr><th>ADDRESS</th><td><?php echo $row["address"];?> </td></tr>
             <tr><th>MOBILE</th><td><?php echo $row["mob_no"];?> </td></tr>
             <tr><th>MAIL ID</th><td><?php echo $row["mail_id"];?> </td></tr>
             <tr><th>PUBLICATIONS</th><td><?php echo $row["publications"];?> </td></tr>
             
            <?php } ?>
          	<?php } ?>
          
       

        </table>



      </div>
    </div>
    
  <!--<div id="sidebar_container">
       <div class="sidebar">
          <h3>Timetable</h3>-->

      
        </div>
        
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
