<?php
require_once('db_connection.php');
$conn = db_connect();

    if(isset($_POST['updatedata']))
    {   
        
        $id =    $_POST['intern_id'];
        $intern_title = $_POST['intern_title'];
     
        $discription = $_POST['discription'];

        $type = $_POST['type'];
       
        

        $update = "UPDATE internship 
                  SET intern_title='$intern_title',
                      discription='$discription',
                      type='$type'
                      WHERE 
                      intern_id = '$id'";
        $update_result = mysqli_query($conn,$update);
        if(mysqli_error($conn)){
            echo '<script> alert("Data Not Updated"); </script>';
            echo 'Error: '.mysqli_error($conn);
            }
        else{
           echo '<script> alert("Data Updated"); </script>';
           header("Location:internship.php");
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