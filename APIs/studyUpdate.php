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
    $start_edu = $dt["start_edu"];
    $duration = $dt["duration"];
    $interest = $dt["interest"];
    /*$c = $dt["interest"];*/
     $interest = implode(',', $interest);
    // echo $interest ;

    $data = array();
    

    //$count = count($c);

    /*if ($count > 1) {
        for($i=0; $i < $count ; $i++){
            $interest .= $c[$i].",";
            
            
        }
        
        
    } else {
        $interest = $c[0];
        
       
    }*/

$sql ="UPDATE students
        SET edu_start='$start_edu',
            duration='$duration',
            interest='$interest'
            WHERE 
            sid = '$sid'";
$result = mysqli_query($con,$sql);
if(!mysqli_error($con)){
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