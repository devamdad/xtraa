<?php

header('content-type:application/json');    
$request = $_SERVER['REQUEST_METHOD'];

switch($request){
    case 'GET':
       
        getRuquest();
        break;
   /* case 'POST':
        $dt = json_decode(file_get_contents('php://input'),true);
        postRuquest($dt);
        break;
    case 'PUT':
        $dt = json_decode(file_get_contents('php://input'),true);
        putRuquest($dt);
        break;
    case 'DELETE':
        # code...
        break;*/
    default:
       echo "No Data Found";
    break;
}

function getRuquest(){
    require_once('../db_connection.php');
    $con = db_connect();
    $sql='SELECT * FROM university';
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $data = [];
        while ($rows = mysqli_fetch_object($result)) {
            $data['university'][] = $rows;
            
        }
        
        echo json_encode($data);
                    
    } else {
         echo "no data found";
    }
}

?>