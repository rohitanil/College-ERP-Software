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
       
        
        
        <p><strong>TEACHER'S LIST</strong></p>
        <table style="width:100%; border-spacing:0;">
          
          
          <?php
          $con1=mysqli_connect('localhost','root','','sampledata');
          if(!$con1)
			{
				echo"connection failed";
				exit();
			}
			else
			{	mysqli_select_db($con1,'teacher');
				$designation=$_POST['designation'];
        if(strcmp($designation,'7')==0)
        { ?>
          <tr><th>NAME</th><th>DEPARTMENT</th></tr>
          <?php
          $res=mysqli_query($con1,"SELECT username,dept FROM teacher  ");
        }
        elseif(strcmp($designation, '8')==0)
        {?>
          <tr><th>NAME</th><th>DEPARTMENT</th><th>BATCH</th><th>COURSE</th></tr>
          <?php
          $res=mysqli_query($con1,"SELECT name,dept,batch,course_id FROM staffadvisor");?>


          <?php while ($row=mysqli_fetch_assoc($res))
          {
            ?>
             <tr>
             <td><?php echo $row["name"];?> </td>
             <td><?php echo $row["dept"];?> </td>
             <td><?php echo $row["batch"];?> </td>
             <td><?php echo $row["course_id"];?> </td>
             </tr>
           
            <?php  } ?>
            <?php }
        else
          {?>
          <tr><th>NAME</th><th>DEPARTMENT</th></tr>
          <?php
			     $res=mysqli_query($con1,"SELECT username,dept FROM teacher WHERE desig='$designation'");
			     }?>
			<?php while ($row=mysqli_fetch_assoc($res))
			{
			?>
             <tr>
             <td><?php echo $row["username"];?> </td>
             <td><?php echo $row["dept"];?> </td>
             
             </tr>
           
            <?php } ?>
          	<?php } ?>
          
       

        </table>
      
        
      </div>
    </div>
    
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
