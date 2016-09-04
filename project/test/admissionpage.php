
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
  

      </nav>    <div id="site_content">
      
      <div class="content">
       
        
      
        <h2>Enter your details</h2>
        <form action="admission.php" method="post" enctype="multipart/form-data">
          <div class="form_settings">
            <h4>Basic Info</h4><br>
             <p>
            <a href="logout.php" class="btn btn-info btn-lg" style="float: right">
            <span class="glyphicon glyphicon-log-out"></span> Log out
           </a>
         </p> 

            <p><span>ADMISSION NUMBER</span><input type="text" name="admnno" maxlength="6" value="" /></p>  
             <p><span>COURSE</span><select  id="course" name="course"> <option value="btech">BTECH</option><option value="mtech">MTECH</option></select></p>

            <p><span>NAME</span><input type="text" name="name" value="" /></p>
             <p><span>DOB</span><input type="date" name="age"/></p>
            <p><span>SEX</span><select  id="sex" name="sex"> <option value="m">MALE</option>
              <option value="f">FEMALE</option><option value="o">OTHER</option> </select></p>     
            <p><span>CONTACT</span><input type="text" name="contact" maxlength="10" value="" /></p>
            <p><span>EMAIL ID</span><input type="text" name="emailid" value="" /></p>
            <p><span>NEW PASSWORD</span><input type="password" name="newpass" placeholder="New Password"></p>
            <p><span>CONFIRM PASSWORD</span><input type="password" name="confirmpass" placeholder="Confirm Password"></p>
            
            
            <br><h4>Personal Info</h4>
            <p><span>ADDRESS</span><textarea rows="8" cols="50" name="address"></textarea></p>
            <p><span>GUARDIAN'S NAME</span><input type="text" name="guardian" value="" /></p>
            <p><span>GUARDIAN'S CONTACT</span><input type="text" name="guardcontact" maxlength="10" value="" /></p>
            <p><span>RELIGION</span><input type="text" name="religion" value="" /></p>
            <p><span>RESERVATION</span><select  id="reservation" name="reservation"> <option value="G">GENERAL</option>
           <option value="OBC">OBC</option><option value="SC">SC</option> <option value="ST">ST</option><option value="OTHER">OTHER</option>
           </select></p> 
           
           <br><h4>Academic Info</h4>
            <br><h3>10th Info</h3>
            <p><span>Xth %</span><input type="text" name="10marks" value="" /></p>
            <p><span>BOARD</span><input type="text" name="10board" value="" /></p>
            <p><span>SCHOOL</span><input type="text" name="10school" value="" /></p>
          
           <br><h3>12th Info</h3>
            <p><span>XIIth %</span><input type="text" name="12marks" value="" /></p>
            <p><span>BOARD</span><input type="text" name="12board" value="" /></p>
            <p><span>SCHOOL</span><input type="text" name="12school" value="" /></p>

            <br><h3>Diploma Info</h3>
            <p><span>DIPLOMA %</span><input type="text" name="Dipmarks" value="" /></p>
            <p><span>COLLEGE</span><input type="text" name="Dipcolg" value="" /></p>


            <br><h4>Registration Info</h4>
           
           <p><span>KEAM RANK</span><input type="text" name="rank" value="" /></p>
            <p><span>BRANCH</span><select  id="branch" name="branch"> <option value="M">M</option>
           <option value="P">P</option><option value="U">U</option> <option value="B">B</option><option value="Ta">T-A</option>
           <option value="Tb">T-B</option><option value="R">R</option></select></p> 
            <p><span>SEMESTER</span><select  id="sem" name="sem"> <option value="1">REGULAR</option>
           <option value="3">LATERAL</option>
           </select></p> 
            <p><span>YEAR OF JOINING</span><input type="text" name="YOJ" value="" /></p>
          
            
    
            
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="submit" value="REGISTER" /></p>

           
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
