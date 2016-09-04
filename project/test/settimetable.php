<?php
session_start();
$user1=$_SESSION['user'];
$dept=$_POST["dept"];
$sem=$_POST["sem"];
$course=$_POST["course"];
$day=$_POST["day"];

$p1=$_POST["sub1"];
$p2=$_POST["sub2"];
$p3=$_POST["sub3"];
$p4=$_POST["sub4"];
$p5=$_POST["sub5"];
$p6=$_POST["sub6"];



$con=mysqli_connect('localhost','root','','sampledata');
if(!$con)
{
	echo"connection failed";
	exit();
}
elseif((!empty($p1))||(!empty($p2))||(!empty($p3))||(!empty($p4))||(!empty($p5)))
    {
    switch ($dept) 
    {
    	case 'M':
    		mysqli_select_db($con,"m_timetable");
    		$query="INSERT INTO m_timetable(dept,sem,course,day,p1,p2,p3,p4,p5,p6) VALUES ('$dept','$sem','$course','$day','$p1','$p2','$p3','$p4','$p5','$p6')";
    		break;
    	case 'P':
    		mysqli_select_db($con,"p_timetable");
    		$query="INSERT INTO p_timetable(dept,sem,course,day,p1,p2,p3,p4,p5,p6) VALUES ('$dept','$sem','$course','$day','$p1','$p2','$p3','$p4','$p5','$p6')";
    		break;
    	case 'Ta':
    		mysqli_select_db($con,"ta_timetable");
    		$query="INSERT INTO ta_timetable(dept,sem,course,day,p1,p2,p3,p4,p5,p6) VALUES ('$dept','$sem','$course','$day','$p1','$p2','$p3','$p4','$p5','$p6')";
    		break;
    	case 'Tb':
    		mysqli_select_db($con,"tb_timetable");
    		$query="INSERT INTO tb_timetable(dept,sem,course,day,p1,p2,p3,p4,p5,p6) VALUES ('$dept','$sem','$course','$day','$p1','$p2','$p3','$p4','$p5','$p6')";
    		break;
    	case 'U':
    		mysqli_select_db($con,"u_timetable");
    		$query="INSERT INTO u_timetable(dept,sem,course,day,p1,p2,p3,p4,p5,p6) VALUES ('$dept','$sem','$course','$day','$p1','$p2','$p3','$p4','$p5','$p6')";
    	case 'B':
    		mysqli_select_db($con,"b_timetable");
    		$query="INSERT INTO b_timetable(dept,sem,course,day,p1,p2,p3,p4,p5,p6) VALUES ('$dept','$sem','$course','$day','$p1','$p2','$p3','$p4','$p5','$p6')";
    		break;
    	case 'R':
    		mysqli_select_db($con,"r_timetable");
    		$query="INSERT INTO r_timetable(dept,sem,course,day,p1,p2,p3,p4,p5,p6) VALUES ('$dept','$sem','$course','$day','$p1','$p2','$p3','$p4','$p5','$p6')";
    		break;
    }
	
	
	
	 if(!mysqli_query($con,$query))
        {
    	  
           printf("ERROR: %s",mysqli_error($con));
    	   exit();
        }
        header("Location: timetable.php");
        mysqli_close($con);
	}
else
    {
        header("Refresh:0;url:timetable.php");
        echo '<script type="text/javascript">alert("Fields cannot be empty");window.history.go(-1);</script>';

    }


?>