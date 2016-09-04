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
          <li><a href="hodpage.php">HOME</a></li>
          <li><a href="#">STUDENT</a></li>
          <li><a href="#">ATTENDENCE</a></li>
          
          <li><a href="#">CONTROL</a>
            <ul>
            <li><a href="#">Department</a>
              <ul>
              <li class="selected"><a href="setstaffadvisorpage.php">Staff Advisor</a></li>
              <li><a href="#">Subjects</a>
              <ul>
              <li><a href="hod_addsubpage.php">Add Subjects</a></li>
              <li><a href="demo1.php">Assign Teacher</a></li>
              </ul>
              </li>
              <li><a href="#">View</a>
                  <ul>
              <li><a href="#">Subject List</a></li>
              <li><a href="#">Teacher List</a></li>
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
          <li><img src="images/FB_IMG_1436462311944.jpg" width="960" height="527"></li>
           <li><img src="images/11011456_787326061342573_8274311906941130285_n.jpg" width="960" height="540"></li>
         
        </ul>
      </div>
      
        
      </div>
       <div id="form">
      <h2>SET STAFF ADVISOR</h2>
      <form action="setstaffadvisor.php" method="post"><!-- Add form action and other stuff -->
      	<div class="form_settings">
      	<p><strong><span>COURSE</span></strong>
      			<select id="course" name="course">
      						<li><option value="btech">BTECH</option></li>
      						<li><option value="mtech">MTECH</option></li>	
  </select></p>
      		<p><strong><span>DEPARTMENT</span></strong>
      			<select id="dept" name="dept">
      						<?php 
      						 if(strcmp($_SESSION['dept'],'M')==0)
      						 {?>
      						 	<li><option value="M">M</option></li> 
      						 	<li><option value="P">P</option></li> 
      						 	<li><option value="U">U</option></li> 
      						<?php }
      						else
      						{?>
      							<li><option value="<?php echo $_SESSION['dept'];?>"> <?php echo $_SESSION['dept'];?> </option></li>
      						<?php
      					    }
      						?>
      			</select></p>

      			
     
           <p><strong><span>TEACHER</span></strong>
           <select id="teacher" name="teacher">  
           
          <?php
          $con1=mysqli_connect('localhost','root','','sampledata');
          if(!$con1)
        {
        echo"connection failed";
        exit();
         }
        else
       {

        mysqli_select_db($con1,"teacher");
        $dept1=$_SESSION['dept'];
        $user=$_SESSION['user'];

        $query="SELECT username FROM teacher WHERE dept='$dept1' AND name !='$user'";
        $result1=mysqli_query($con1,$query);

        
          ?>
      
        <?php while ($row1=mysqli_fetch_array($result1))
       {
       ?>
                 
            <li><option> <?php echo $row1['username'];?> </option></li> 
           
            
           
            <?php } ?>
            <?php } ?>
            </select></p>
          


      <p><strong><span>BATCH</span></strong></p>
      <select id="year" name="year"></select>
      					
      			
       
      	
      	
      	<p style="padding-top: 15px"><input class="submit" type="submit" name="submit" value="SUBMIT" /></p>
      </form>
       
      </div>
    </div>
   
 <script type="text/javascript">
var start=2016;
var end1=new Date().getFullYear();
var end=end1+4;
var options="";
for(var year=start;year<=end;year++)
{
  options+="<option>"+year+"</option>";

}
document.getElementById("year").innerHTML=options;
 </script>
  
  
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
