<?php

$con=mysqli_connect('localhost','root','','sampledata');
$course=$_POST['course'];
$dept=$_POST['dept'];
$teacher=$_POST['teacher'];
$batch=$_POST['year'];


	if(!$con)
	{
		echo "connection failed";
		die();
	}
	else
	{
		mysqli_select_db($con,"login");
		mysqli_select_db($con,"teacher");
		$result=mysqli_query($con,"SELECT name,dept FROM teacher WHERE username='$teacher'");
		if(!$result)
		{
			 printf("ERROR: %s",mysqli_error($con));
             exit();
		}
		$row=mysqli_fetch_array($result);
		$userid=$row['name'];
		
		$chkdept=$row['dept'];
		if(strcmp($dept,'M')==0||strcmp($dept,'U')==0||strcmp($dept,'P')==0)
		{
			$chkdept=$dept;
		}
		if(strcmp($chkdept, $dept)!=0)
		{
			 header("Refresh:0;url:setstaffadvisorpage.php");
             echo '<script type="text/javascript">alert("Department doesnt match!!!");window.history.go(-1);</script>';
             exit();
		}
		

		if(!mysqli_query($con,"INSERT INTO staffadvisor (name,userid,dept,course_id,batch) VALUES ('$teacher','$userid','$dept','$course','$batch')"))
		{
			 
             header("Refresh:0;url:setstaffadvisorpage.php");
			 echo '<script type="text/javascript">alert("Already assigned as Staff Advisor.");window.history.go(-1);</script>';
			 

		}
		

		$query2="UPDATE login SET access_level='8' WHERE user='$userid'";
		$query3="UPDATE teacher SET staffadv='1' WHERE name='$userid'";
		
		if(!mysqli_query($con,$query2)|| !mysqli_query($con,$query3))
		{
			 printf("ERROR: %s",mysqli_error($con));
             exit();
		}

		 header("Location:setstaffadvisorpage.php");
         mysqli_close($con);
    }
?>