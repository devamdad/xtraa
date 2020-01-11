<?php
header('content-type:application/json');    
$request = $_SERVER['REQUEST_METHOD'];

switch($request){
   case 'POST':
       $dt = json_decode(file_get_contents('php://input'),true);
       postRuquest($dt);
       break;
   default:
       echo "No Data Found";
   break;
}

function postRuquest($dt){
    require_once('../db_connection.php');
    $con = db_connect();
    $sid = $dt["sid"];
    $full_name = $dt["full_name"];
    $alias = $dt["alias"];
    $gender = $dt["gender"];
    $data = array();

    $sql ="UPDATE students
        SET s_name='$full_name',
            alias='$alias',
            gender='$gender'
            WHERE 
            sid = '$sid'";
    if(mysqli_query($con,$sql)){
        $status = "successful";
        $data['students']['sid'] = $sid;
        $data['students']['Status'] = $status;
        echo json_encode($data);
    
       
       
    }else{
        $status = "error";
        $data['students']['sid'] = $sid;
        $data['students']['Status'] = $status;
        echo json_encode($data);
        echo mysqli_error($con);
    }



};

?>