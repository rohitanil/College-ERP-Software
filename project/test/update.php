<?php
$con=mysqli_connect('localhost','root','','sampledata');
if(!$con)
{
	echo"connection failed";
	exit();
}
mysqli_select_db($con,"coursework");
$query="TRUNCATE coursework ";
if((mysqli_query($con,$query)))
        {
           mysqli_select_db($con,"assignment");
           $query="TRUNCATE assignment";
           mysqli_query($con,$query);
           $query="TRUNCATE m_timetable";
           mysqli_query($con,$query);
           $query="TRUNCATE p_timetable";
           mysqli_query($con,$query);
           $query="TRUNCATE u_timetable";
           mysqli_query($con,$query);
           $query="TRUNCATE b_timetable";
           mysqli_query($con,$query);
           $query="TRUNCATE ta_timetable";
           mysqli_query($con,$query);
           $query="TRUNCATE tb_timetable";
           mysqli_query($con,$query);
           $query="TRUNCATE r_timetable";
           mysqli_query($con,$query);

          
//writing sessionals to text file
   

           $query="TRUNCATE R7_sessionals";
           mysqli_query($con,$query);
           $query="TRUNCATE R8_sessionals";
           mysqli_query($con,$query);


           $query="TRUNCATE r_teachersubjectlist";
           mysqli_query($con,$query);
           $query="TRUNCATE m_teachersubjectlist";
           mysqli_query($con,$query);
           $query="TRUNCATE p_teachersubjectlist";
           mysqli_query($con,$query);
           $query="TRUNCATE u_teachersubjectlist";
           mysqli_query($con,$query);
           $query="TRUNCATE b_teachersubjectlist";
           mysqli_query($con,$query);
           $query="TRUNCATE ta_teachersubjectlist";
           mysqli_query($con,$query);
           $query="TRUNCATE tb_teachersubjectlist";
           mysqli_query($con,$query);
           
          $query1="UPDATE student_biodata SET sem=sem+1 ";
         // mysqli_query($con,$query1);
         // $query2="INSERT INTO alumnitable SELECT * FROM student_biodata WHERE sem>8 ";
         // mysqli_query($con,$query2);
         // $query3="DELETE FROM student_biodata WHERE sem>8";
          //mysqli_query($con,$query3);

          // if((mysqli_query($con,$query)))
           //{
            // echo '<script type="text/javascript">alert("Updation Successful!!");window.history.go(-1);</script>';
    	       //header("Refresh:0;url:adminhomepage.php");
             //mysqli_close($con);
           
           //}
        }

?>