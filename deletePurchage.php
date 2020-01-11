<?php
require_once('db_connection.php');
$conn = db_connect();

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $delete = "DELETE FROM purchage WHERE pid='$id'";
    $delete_result = mysqli_query($conn,$delete);

    if(mysqli_error($conn)){
            echo '<script> alert("Data Not deleted"); </script>';
            echo 'Error: '.mysqli_error($conn);
            }
    else{
           echo '<script> alert("Data deleted"); </script>';
           header("Location:purchage.php");
    }
}

?>
