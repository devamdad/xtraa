<?php
require_once('db_connection.php');
$conn = db_connect();

    if(isset($_POST['updatedata']))
    {   
        
        $id =    $_POST['cid'];
        $course_name = $_POST['course_name'];
        $deg = $_POST['deg'];
        $cpin_id = $_POST['cpin_id'];
       
        

        $update = "UPDATE courses 
                  SET c_name='$course_name',
                      degree='$deg',
                      pinid='$cpin_id'
                      WHERE 
                      cid = '$id'";
        $update_result = mysqli_query($conn,$update);
        if(mysqli_error($conn)){
            echo '<script> alert("Data Not Updated"); </script>';
            echo 'Error: '.mysqli_error($conn);
            }
        else{
           echo '<script> alert("Data Updated"); </script>';
           header("Location:courses.php");
        }

        /*if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:update.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }*/
    }
?>