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
           <li><a href="searchstudpage.php">Search</a>
            <li class="selected"><a href="sessionalpage.php">Sessional</a>
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
       
      


        <form action="sessionalgen.php" method="post">
          <div class="form_settings">
          <h2>SESSIONAL GENERATOR</h2>
  			<?php
  			$course=$_POST['course'];
  			$dept=$_POST['dept'];
  			$sub=$_POST['sub'];
  			
	        $user=$_SESSION['user'];

	        $con=mysqli_connect('localhost','root','','sampledata');
            if(!$con)
	         {	
		      echo "connection failed";
		      exit();
	         }
	        
	              if($dept == "R")
 					{
  					 $dbselected1='r_teachersubjectlist';
  					 
                    }
                 elseif($dept == "M")
                   {
                    $dbselected1='m_teachersubjectlist';
                                       }
                 elseif($dept == "P")
                  {
                   $dbselected1='p_teachersubjectlist';
                                     }
                  elseif($dept == "U")
                  {
                   $dbselected1='u_teachersubjectlist';
                   
                  }
                  elseif($dept == "B")
                  {
                   $dbselected1='b_teachersubjectlist';
                   
                  }
                 elseif($dept == "Ta")
                  {
                   $dbselected1='ta_teachersubjectlist';
                   
                  }
                  elseif($dept == "Tb")
                  {
                   $dbselected1='tb_teachersubjectlist';
                   
                  }

	        

	        $query1="SELECT subcode,sem FROM `$dbselected1` WHERE teacher='$user'";
	        $result=mysqli_query($con,$query1);
	        $row=mysqli_fetch_assoc($result);
            $subcode=$row['subcode'];
            $sem=$row['sem'];
           

            $branchsem=$dept;
	        $branchsem.=$sem;
	        $subcode=substr($subcode, 3);
	        $_SESSION['subcode']=$subcode;

	        switch($branchsem)
	        {
	        	case 'R7':
	        		$dbselected='r7_sessionals';
	        		break;
	        	case 'R8':
	        		$dbselected='r8_sessionals';
	        		break;
	        }
	        $_SESSION['dbsel']=$dbselected;
	        $query2="SELECT name,admno FROM `$dbselected` ORDER BY name ASC";
	        $result=mysqli_query($con,$query2);

	        
	        $i=1;?>
	         <table style="width:100%; border-spacing:0;">
	         <h2 align="left"><?php echo $branchsem ?></h2>
	         <h2><?php echo $sub?></h2>

	         <tr><th>Admno</th><th>Name</th><th>Series1</th><th>Series2</th><th>Assign1</th><th>Assign2</th><th>Assign3</th><th>Attendence</th></tr>
	        <?php
	        while($row=mysqli_fetch_assoc($result))
	        {
	        	$admno="admno";
	            $name="name";
	            $series1="series1";
	            $series1.=$i;
	            $series2="series2";
	            $series2.=$i;
	            $ass1="ass1";
	            $ass2="ass2";
	            $ass3="ass3";
	            $attn="attn";
	            $ass1.=$i;
	            $attn.=$i;
	            $ass2.=$i;
	            $ass3.=$i;
	        	$admno.=$i;
	        	$name.=$i;
	        	++$i;


	        	//echo "$series1";
	        	//echo "$series2";
	        	//echo "$ass1";
	        	//echo "$ass2";
	        	//echo "$ass3";
	        	
	        	//echo "$attn";
	        	

	        	
	
	        	?>

	        	
	        	 <p>
	        	 <tr>
	        	 <td><input type="text" name="<?php echo $admno?>" maxlength="6" value="<?php echo $row['admno']; ?>"style="WIDTH: 45px; HEIGHT: 20px"/></td>
	        	 <td><input type="text" name="<?php echo $name?>"maxlength="15" value="<?php echo $row['name']; ?>"style="WIDTH: 90px; HEIGHT: 20px" /></td>

	        	  <td><input type="text" name="<?php echo $series1?>" maxlength="6" value=""style="WIDTH: 45px; HEIGHT: 20px"/></td>
	        	   <td><input type="text" name="<?php echo $series2?>" maxlength="6" value=""style="WIDTH: 45px; HEIGHT: 20px"/></td>

	        	   <td> <input type="text" name="<?php echo $ass1?>" maxlength="6" value=""style="WIDTH: 45px; HEIGHT: 20px"/></td>
	        	    <td> <input type="text" name="<?php echo $ass2?>" maxlength="6" value=""style="WIDTH: 45px; HEIGHT: 20px"/></td>
	        	      <td><input type="text" name="<?php echo $ass3?>" maxlength="6" value=""style="WIDTH: 45px; HEIGHT: 20px"/></td>

	        	      <td><input type="text" name="<?php echo $attn?>" maxlength="6" value=""style="WIDTH: 45px; HEIGHT: 20px"/></td>

	        	      </tr>
	        	 </p> 


	      <?php  }?>
	      </table>

           
            
    	  
          


  			
           <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="submit" value="SAVE" style="float:right" /></p>
          </div>
        </form>
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
