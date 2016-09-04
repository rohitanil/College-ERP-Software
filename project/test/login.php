<?php
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$con=mysqli_connect('localhost','root','','sampledata');
	$con2=mysqli_connect('localhost','root','','sampledata');
      $con3=mysqli_connect('localhost','root','','sampledata');


	if(!$con)
	{
		echo "connection failed";
		die();
	}
	else
	{
		
		mysqli_select_db($con,"login");
		mysqli_select_db($con2,"teacher");
            mysqli_select_db($con3,"student");

		$result=mysqli_query($con,"SELECT user,user2,pass,access_level,dept,sem FROM login WHERE user='$user' OR user2='$user'");

		$row=mysqli_fetch_array($result);
		if(!$result)
		{
			printf("Error %s",mysqli_error($con));
			exit();
		}
		if(($row["user"]==$user && $row["pass"]==$pass)||($row["user2"]==$user && $row["pass"]==$pass))
		{	
			
	             $result1=mysqli_query($con3,"SELECT sem FROM student_biodata WHERE admissionno='$user'");
                   $row1=mysqli_fetch_array($result1);
			mysqli_query($con,"UPDATE login SET last_login= CURRENT_TIMESTAMP WHERE user='$user'OR user2='$user'");
			session_start();
			$_SESSION['user'] = $user;
			$_SESSION['access_level']=$row["access_level"];
			$_SESSION['dept']=$row["dept"];
			$_SESSION['sem']=$row1["sem"];
			
          //Various home page based on access level

            if (strcmp($_SESSION['access_level'],'1')==0)  //Admin
            {
            	header("Location:adminhomepage.php");
            }
            if (strcmp($_SESSION['access_level'],'2')==0) //HOD
            {
            	$result2=mysqli_query($con2,"SELECT address FROM teacher WHERE name='$user'");
            	$row2=mysqli_fetch_array($result2);
            	
            	if(!empty($row2['address']))
            	{
            		header("Location:hodpage.php");
            	}
            	else
            	{
            	header("Location:teacherdetailpage.php");
                }
            }
            if (strcmp($_SESSION['access_level'],'3')==0)  //professor
            {
            	$result2=mysqli_query($con2,"SELECT address FROM teacher WHERE name='$user'");
            	$row2=$row=mysqli_fetch_array($result2);
            	if(empty($row2["address"]))
            	{
            		header("Location:teacherdetailpage.php");
            	}
            	else
            	{
            	header("Location:home.php");
                }
            }
            if (strcmp($_SESSION['access_level'],'4')==0)  //asst.professor
            {
            	$result2=mysqli_query($con2,"SELECT address FROM teacher WHERE name='$user'");
            	$row2=$row=mysqli_fetch_array($result2);
            	if(empty($row2["address"]))
            	{
            		header("Location:teacherdetailpage.php");
            	}
            	else
            	{
            	header("Location:home.php");
                }
            }
            if (strcmp($_SESSION['access_level'],'5')==0)  //lecturer
            {
            	$result2=mysqli_query($con2,"SELECT address FROM teacher WHERE name='$user'");
            	$row2=$row=mysqli_fetch_array($result2);
            	if(empty($row2["address"]))
            	{
            		header("Location:teacherdetailpage.php");
            	}
            	else
            	{
            	header("Location:home.php");
                }
            }
            if (strcmp($_SESSION['access_level'],'6')==0)  //guest lecturer
            {
            	$result2=mysqli_query($con2,"SELECT address FROM teacher WHERE name='$user'");
            	$row2=$row=mysqli_fetch_array($result2);
            	if(empty($row2["address"]))
            	{
            		header("Location:teacherdetailpage.php");
            	}
            	else
            	{
            	header("Location:home.php");
                }
            }
            

            if (strcmp($_SESSION['access_level'],'7')==0)	//Student
            {
            	header("Location:studentpage.php");
            }

             if (strcmp($_SESSION['access_level'],'8')==0)  //StaffAdvisor
            {
                  header("Location:staffadvisorhomepage.php");
            }

                if (strcmp($_SESSION['access_level'],'9')==0)  //admission
            {
                  header("Location:admissionpage.php");
            }
            
			
			

		}
		else
		{
			header("Refresh:0;url:login.html");
			echo '<script type="text/javascript">alert("Incorrect username or password");window.history.go(-1);</script>';


		}
		mysqli_close($con);
		mysqli_close($con2);
		exit();
	}

?>