<?php
require_once('db_connection.php');
$conn = db_connect();

    if(isset($_POST['updatedata']))
    {   
        
        $id =    $_POST['uid'];
        $uni_name = $_POST['uni_name'];
        $uni_loc = $_POST['uni_loc'];
        $uni_country = $_POST['uni_country'];
       
        

        $update = "UPDATE university 
                  SET u_name='$uni_name',
                      u_location='$uni_loc',
                      u_country='$uni_country'
                      WHERE 
                      uid = '$id'";
        $update_result = mysqli_query($conn,$update);
        if(mysqli_error($conn)){
            echo '<script> alert("Data Not Updated"); </script>';
            echo 'Error: '.mysqli_error($conn);
            }
        else{
           echo '<script> alert("Data Updated"); </script>';
           header("Location:university.php");
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