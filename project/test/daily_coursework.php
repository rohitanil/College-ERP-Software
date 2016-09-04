
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
  <div id="main">
    <header>
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
         
         
        </div>
      </div>
      <nav>
        <ul class="sf-menu" id="nav">
          <li><a href="home.php">HOME</a></li>
           <li><a href="#">STUDENT</a>
          <ul>
           <li><a href="searchstudpage.php">Search</a>
            <li><a href="sessionalpage.php">Sessional</a>
            </ul>
            </li>
          <li><a href="#">ATTENDENCE</a></li>
         
          <li><a href="#">TEACHER'S DIARY</a>
            <ul>
              <li><a href="#">Assignment</a>
              <ul>
                <li ><a href="assign.php">Set</a></li>
              </ul>
              </li>
              <li class="selected"><a href="#">Daily Course Work</a>
              
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
      </div>
      
      <div class="content">
       
        
      
        <h2>SET COURSEWORK</h2>
        <form action="coursework.php" method="post">
          <div class="form_settings">
              <p><span><strong>COURSE</strong></span><select  name="course_id">
              <option value="BTECH">BTECH</option>
              <option value="MTECH">MTECH</option>
              </select></p> 
            
            
            
            <p><span><strong>DEPARTMENT</strong></span><select name="dept">
            
              <?php 
                   if(strcmp($_SESSION['dept'],'M')==0)
                   {?>
                    <li><option value="M">M</option></li> 
                    <li><option value="P">P</option></li> 
                    <li><option value="U">U</option></li> 
                  <?php }
                  elseif(strcmp($_SESSION['dept'],'T')==0)
                    {?>
                    <li><option value="Ta">T-A</option></li> 
                    <li><option value="Tb">T-B</option></li> 
                     
                  <?php }
                  else
                  {?>
                    <li><option value="<?php echo $_SESSION['dept'];?>"> <?php echo $_SESSION['dept'];?> </option></li>
                  <?php
                    }
                  ?></select></p>
            
            
            
               <p><span><strong>SUBJECT</strong></span><select name="sub">
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
        $user=$_SESSION['user'];
        if($dept == "R")
 {
  $dbselected1='r_teachersubjectlist';
  $dbselected2='r_subjectlist';
 }
 elseif($dept == "M")
 {
  $dbselected1='m_teachersubjectlist';
  $dbselected2='m_subjectlist';
 }
 elseif($dept == "P")
 {
  $dbselected1='p_teachersubjectlist';
  $dbselected2='p_subjectlist';
 }
 elseif($dept == "U")
 {
  $dbselected1='u_teachersubjectlist';
  $dbselected2='u_subjectlist';
 }
 elseif($dept == "B")
 {
  $dbselected1='b_teachersubjectlist';
  $dbselected2='b_subjectlist';
 }
 elseif($dept == "Ta")
 {
  $dbselected1='ta_teachersubjectlist';
  $dbselected2='t_subjectlist';
 }
 elseif($dept == "Tb")
 {
  $dbselected1='tb_teachersubjectlist';
  $dbselected2='t_subjectlist';
 }
        $query="SELECT sub FROM `$dbselected1` WHERE teacher='$user'";
        $result1=mysqli_query($con1,$query);

        
          ?>
      
        <?php while ($row1=mysqli_fetch_array($result1))
       {
       ?>
                 
            <li><option value="<?php echo $row1['sub'];?>"> <?php echo $row1['sub'];?> </option></li> 
           
            
           
            <?php } ?>
            <?php } ?>
            </select></p>
            
            <p><span><strong>DATE</strong></span><input type="date" name="submit_date" /></p>
            <p><span><strong>TOPIC</strong></span><textarea rows="8" cols="50" name="topic"></textarea></p>
       
            
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
