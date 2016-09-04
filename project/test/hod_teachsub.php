<?php
session_start();
$dept=$_POST['dept-choice'];
$sem=$_POST['first-choice'];
$sub=$_POST['second-choice'];
$teacher=$_POST['teacher'];
$course=$_POST['course_id'];

$con=mysqli_connect('localhost','root','','sampledata');
if(!$con)
	{	
		echo "connection failed";
		exit();
	}
else
{

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
 
 $query1="SELECT `sub_code` FROM `$dbselected2` WHERE `sub_name`='$sub'";
 $result=mysqli_query($con,$query1);
 $row=mysqli_fetch_assoc($result);
 $subcode=$row['sub_code'];
 $query2="INSERT INTO `$dbselected1`(course,subcode,sub,sem,teacher) VALUES('$course','$subcode','$sub','$sem','$teacher')";
 if(!mysqli_query($con,$query2))
        {
    	  
           printf("ERROR: %s",mysqli_error($con));
    	   exit();
        }

       echo "<script type='text/javascript'>alert('Entry Successful!!!');
       window.location='demo1.php';
       </script>";
        mysqli_close($con);
}    

?>