<?php
session_start();
$user1=$_SESSION['user'];
$ass_id=$_POST["ass_id"];
$dept=$_POST["dept"];
//$sem=$_POST["sem"];
$course_id=$_POST["course_id"];
$sub=$_POST["sub"];
$submit_date=$_POST["submit_date"];
$assign_data=$_POST["assign_data"];


$con=mysqli_connect('localhost','root','','sampledata');
if(!$con)
{
	echo"connection failed";
	exit();
}
elseif((!empty($sub))||(!empty($submit_date))||(!empty($assign_data)))
    {
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
       $query1="SELECT sem FROM `$dbselected1` WHERE teacher='$user' AND sub ='$sub'";
       $result=mysqli_query($con,$query1);
       $row=mysqli_fetch_assoc($result);
 $sem=$row['sem'];
	
	   $query="INSERT INTO assignment (ass_id,dept,sem,course_id,assign_data,submit_date,sub,user1) VALUES ('$ass_id','$dept','$sem','$course_id','$assign_data','$submit_date','$sub','$user1')";
        if(!mysqli_query($con,$query))
        {
    	  
           printf("ERROR: %s",mysqli_error($con));
    	   exit();
        }
        
        echo "<script type='text/javascript'>alert('Entry Successful!!!');
       window.location='assign.php';
       </script>";
        mysqli_close($con);
    }
else
    {
        header("Refresh:0;url:assign.php");
        echo '<script type="text/javascript">alert("Fields cannot be empty");window.history.go(-1);</script>';

    }


?>