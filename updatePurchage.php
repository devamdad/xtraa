<?php
require_once('db_connection.php');
$conn = db_connect();

    if(isset($_POST['updatedata']))
    {   
        
        $id =    $_POST['pid'];
        $pur_name = $_POST['pur_name'];
        $pur_date = $_POST['pur_date'];
        $transaction_id = $_POST['transaction_id'];
       
        

        $update = "UPDATE purchage 
                  SET pname='$pur_name',
                      pdate='$pur_date',
                      trans_id='$transaction_id'
                      WHERE 
                      pid = '$id'";
        $update_result = mysqli_query($conn,$update);
        if(mysqli_error($conn)){
            echo '<script> alert("Data Not Updated"); </script>';
            echo 'Error: '.mysqli_error($conn);
            }
        else{
           echo '<script> alert("Data Updated"); </script>';
           header("Location:purchage.php");
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