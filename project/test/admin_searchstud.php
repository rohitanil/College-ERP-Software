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
          
          <li><a href="adminhomepage.php">HOME</a></li>
          
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
              <li class="selected"><a href="admin_searchstudpage.php">Search</a></li>
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
      
        
      </div>
       <div id="form">
      
        <h2>STUDENT DETAILS</h2>
        <table style="width:100%; border-spacing:0;">
        
          <?php
          $admn=$_POST['search'];
          
          $con1=mysqli_connect('localhost','root','','sampledata');
          if(!$con1)
        {
        echo"connection failed";
        exit();
         }
        else
       {  
        $query="SELECT * FROM student_biodata WHERE admissionno='$admn'";
        $result1=mysqli_query($con1,$query);
          
          if($result1->num_rows === 0)
          {
              header("Refresh:0;url:searchstudpage.php");
        echo '<script type="text/javascript">alert("Student not found!!!!");window.history.go(-1);</script>';

          }?>
        
        
         
      
      
        <?php while ($row=mysqli_fetch_assoc($result1))
       {
       ?>
             <tr><th>NAME</th><td><?php echo $row["name"];?> </td></tr>
             <tr><th>DEPARTMENT</th><td><?php echo $row["branch"];?> </td></tr>
             
             <tr><th>JOINED ON</th><td><?php echo $row["year_of_join"];?> </td></tr>
             <tr><th>SEMESTER</th><td><?php echo $row["sem"];?> </td></tr>
             <tr><th>DATE OF BIRTH</th><td><?php echo $row["age"];?> </td></tr>
             <tr><th>SEX</th><td><?php echo $row["sex"];?> </td></tr>
             <tr><th>MAIL ID</th><td><?php echo $row["emailid"];?> </td></tr>
             <tr><th>CONTACT</th><td><?php echo $row["mobno"];?> </td></tr>
             <tr><th>GUARDIAN'S NAME</th><td><?php echo $row["guardian_name"];?> </td></tr>
             <tr><th>CONTACT</th><td><?php echo $row["guard_contact"];?> </td></tr>
             <tr><th>RELIGION</th><td><?php echo $row["religion"];?> </td></tr>
             <tr><th>RESERVATION</th><td><?php echo $row["reservation"];?> </td></tr>
             <tr><th>Xth MARKS</th><td><?php echo $row["X_marks"];?> </td></tr>
             <tr><th>XIIth MARKS</th><td><?php echo $row["XII_marks"];?> </td></tr>
             <tr><th>KEAM RANK</th><td><?php echo $row["keam_rank"];?> </td></tr>



             
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
