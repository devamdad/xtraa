<?php
require_once('db_connection.php');
$conn = db_connect();

    if(isset($_POST['updatedata']))
    {   
        
        $id =    $_POST['gid'];
        $group_name = $_POST['group_name'];
     
        $group_pinid = $_POST['group_pinid'];
       
        

        $update = "UPDATE groups 
                  SET gname='$group_name',
                      g_pinid='$group_pinid'
                      WHERE 
                      gid = '$id'";
        $update_result = mysqli_query($conn,$update);
        if(mysqli_error($conn)){
            echo '<script> alert("Data Not Updated"); </script>';
            echo 'Error: '.mysqli_error($conn);
            }
        else{
           echo '<script> alert("Data Updated"); </script>';
           header("Location:groups.php");
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