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
          
          <li class="selected"><a href="studentpage.php">STUDENT HOME</a></li>
          <li><a href="#">ATTENDENCE</a></li>
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
       
        
        
        <p><strong>ASSIGNMENTS</strong></p>
        <table style="width:100%; border-spacing:0;">
          <tr><th>ASSIGNMENT NO</th><th>ASSIGNMENT</th><th>SUBJECT</th><th>SUBMISSION DATE</th></tr>
          
          <?php
          $con1=mysqli_connect('localhost','root','','sampledata');
          if(!$con1)
			  {
				echo"connection failed";
				exit();
			   }
			  else
			 {	mysqli_select_db($con1,"assignment");
				$dept=$_SESSION['dept'];
				$sem=$_SESSION['sem'];
				
			   $result1=mysqli_query($con1,"SELECT ass_id,assign_data,sub,submit_date FROM assignment WHERE dept='$dept' AND sem='$sem'");?>
			
			  <?php while ($row=mysqli_fetch_assoc($result1))
			 {
			 ?>
             <tr>
             <td><?php echo $row["ass_id"];?> </td>
             <td><?php echo $row["assign_data"];?> </td>
             <td><?php echo $row["sub"];?> </td>
             <td><?php echo $row["submit_date"];?> </td>
             </tr>
           
            <?php } ?>
          	<?php } ?>
          
       

        </table>



        <p><strong>COURSEWORK</strong></p>
        <table style="width:100%; border-spacing:0;">
          <tr><th>SL_NO</th><th>SUBJECT</th><th>DATE</th><th>TOPIC</th></tr>
          
          <?php
          $con1=mysqli_connect('localhost','root','','sampledata');
          if(!$con1)
        {
        echo"connection failed";
        exit();
         }
        else
       {  mysqli_select_db($con1,"coursework");
        $dept=$_SESSION['dept'];
        $sem=$_SESSION['sem'];
        
         $result1=mysqli_query($con1,"SELECT sl_no,topic,coursedate,sub FROM coursework WHERE dept='$dept' AND sem='$sem'");?>
      
        <?php while ($row=mysqli_fetch_assoc($result1))
       {
       ?>
             <tr>
             <td><?php echo $row["sl_no"];?> </td>
             <td><?php echo $row["sub"];?> </td>
             <td><?php echo $row["coursedate"];?> </td>
             <td><?php echo $row["topic"];?> </td>
             
             </tr>
           
            <?php } ?>
            <?php } ?>
          
       

        </table>

           <p><strong>TIMETABLE</strong></p>
        <table style="width:100%; border-spacing:0;">
          <tr><th>Day</th><th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th></tr>
          
          <?php
          $con1=mysqli_connect('localhost','root','','sampledata');
          if(!$con1)
        {
        echo"connection failed";
        exit();
         }
        else
       {  
        $dept=$_SESSION['dept'];
        $sem=$_SESSION['sem'];
        switch ($dept) {
          case 'M':

              $DB ="SELECT day,p1,p2,p3,p4,p5,p6 FROM m_timetable WHERE dept='$dept' AND sem='$sem' ORDER BY day";
                break;
          case 'P':
              $DB ="SELECT day,p1,p2,p3,p4,p5,p6 FROM p_timetable WHERE dept='$dept' AND sem='$sem' ORDER BY day";
                break;
          case 'U':
              $DB ="SELECT day,p1,p2,p3,p4,p5,p6 FROM u_timetable WHERE dept='$dept' AND sem='$sem' ORDER BY day";
                break;
          case 'Ta':
              $DB ="SELECT day,p1,p2,p3,p4,p5,p6 FROM ta_timetable WHERE dept='$dept' AND sem='$sem' ORDER BY day";
                break;
          case 'Tb':
              $DB ="SELECT day,p1,p2,p3,p4,p5,p6 FROM tb_timetable WHERE dept='$dept' AND sem='$sem' ORDER BY day";
                break;
          case 'B':
              $DB ="SELECT day,p1,p2,p3,p4,p5,p6 FROM b_timetable WHERE dept='$dept' AND sem='$sem'  ORDER BY day";
                break;

          case 'R':
              $DB ="SELECT day,p1,p2,p3,p4,p5,p6 FROM r_timetable WHERE dept='$dept' AND sem='$sem' ORDER BY day";
                break;
          
          
        }
        
         $result1=mysqli_query($con1,$DB);?>
      
        <?php while ($row=mysqli_fetch_assoc($result1))
       {
       ?>
             <tr>
             <td><?php echo $row["day"];?> </td>
             <td><?php echo $row["p1"];?> </td>
             <td><?php echo $row["p2"];?> </td>
             <td><?php echo $row["p3"];?> </td>
             <td><?php echo $row["p4"];?> </td>
             <td><?php echo $row["p5"];?> </td>
             <td><?php echo $row["p6"];?> </td>

             
             </tr>
           
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
