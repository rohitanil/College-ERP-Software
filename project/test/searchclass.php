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
           <li><a href="home.php">HOME</a></li>
          <li><a href="#">STUDENT</a>
          <ul>
           <li class="selected"><a href="searchstudpage.php">Search</a>
            <li><a href="#">Sessional</a>
            </ul>
            </li>

           
          <li><a href="#">ATTENDENCE</a></li>
          

          
          <li><a href="#">TEACHER'S DIARY</a>
            <ul>
              <li><a href="#">Assignment</a>
              <ul>
              <li><a href="assign.php">Set</a></li>
              </ul>
              </li>
              <li><a href="daily_coursework.php">Daily Course Work</a>
              
              </li>
              <li><a href="#">Timetable</a></li>
              
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
          <li><img src="images/FB_IMG_1436462311944.jpg" width="960" height="527"></li>
           <li><img src="images/11011456_787326061342573_8274311906941130285_n.jpg" width="960" height="540"></li>
         
        </ul>
      </div>
      
        
      </div>
       <div id="form">
      
        <h2>CLASS DETAILS</h2>
        <table style="width:100%; border-spacing:0;">
        
          <?php
          $course=$_POST['course'];
          $dept=$_POST['dept'];
          $sem=$_POST['sem'];
          
          $con1=mysqli_connect('localhost','root','','sampledata');
          if(!$con1)
        {
        echo"connection failed";
        exit();
         }
        else
       {  
        $query="SELECT admissionno,name FROM student_biodata WHERE course='$course' AND branch='$dept' AND sem='$sem' ORDER BY name ASC";
        $result1=mysqli_query($con1,$query);
          
          if($result1->num_rows === 0)
          {
              header("Refresh:0;url:searchstudpage.php");
        echo '<script type="text/javascript">alert("Class list not found!!!!");window.history.go(-1);</script>';

          }


          ?>

          <h2><?php echo $dept,$sem; ?></h2>
        
        
         
      
      
        <?php while ($row=mysqli_fetch_assoc($result1))
       {
       ?>
             
            <tr>
             <td><?php echo $row["admissionno"];?> </td>
             <td><?php echo $row["name"];?> </td>
            
             </tr>
             
             </tr>
           
            <?php } ?>
            <?php } ?>
          
       

        </table>

       
      </div>
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
