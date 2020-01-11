<?php
require_once('db_connection.php');
$conn = db_connect();

    if(isset($_POST['updatedata']))
    {   
        
        $id =    $_POST['s_id'];
        $full_name = $_POST['full_name'];
        $nickName = $_POST['nickName'];
        $gend = $_POST['gend'];
        $start_education = $_POST['start_education'];
        $durr = $_POST['durr'];
        $interests = $_POST['interests'];
        

        $update = "UPDATE students 
                  SET s_name='$full_name',
                      alias='$nickName',
                      gender='$gend',
                      edu_start='$start_education',
                      duration='$durr',
                      interest='$interests'
                      WHERE 
                      sid = '$id'";
        $update_result = mysqli_query($conn,$update);
        if(mysqli_error($conn)){
            echo '<script> alert("Data Not Updated"); </script>';
            echo 'Error: '.mysqli_error($conn);
            }
        else{
           echo '<script> alert("Data Updated"); </script>';
           header("Location:students.php");
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