<?php
session_start();
$user1=$_SESSION['user'];
$name=$_POST["name"];
$userid=$_POST["userid"];
$dept=$_POST["dept"];
$desig=$_POST["designation"];
$password="welcome";


$con=mysqli_connect('localhost','root','','sampledata');
if(!$con)
{
	echo"connection failed";
	exit();
}
elseif((!empty($name)))
    {
	
	   $query1="INSERT INTO teacher (name,username,dept,desig) VALUES ('$userid','$name','$dept','$desig')";
       
        if((mysqli_query($con,$query1)))
        {
    	    $query2="INSERT INTO login (user,pass,access_level,dept) VALUES ('$userid','$password','$desig','$dept')";
            mysqli_query($con,$query2);
            echo '<script type="text/javascript">alert("Insertion Successful!!");window.history.go(-1);</script>';

            
            header("Location:admin_addteacherpage.php");
           
            mysqli_close($con);
           
        }
        
       else
       {
        printf("ERROR: %s",mysqli_error($con));
        exit();
       }
    }
else
    {
        header("Refresh:0;url:admin_addteacherpage.php");
        echo '<script type="text/javascript">alert("Fields cannot be empty");window.history.go(-1);</script>';

    }


?>