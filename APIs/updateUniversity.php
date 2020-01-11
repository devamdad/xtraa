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
    $id = $dt["uid"];
    $u_name = $dt["u_name"];
    $u_location = $dt["u_location"];
    $u_country = $dt["u_country"];

    $data = [];

    if (empty($id)) {
        $sql ="INSERT INTO `university`(`uid`, `u_name`, `u_location`, `u_country`) VALUES('','$u_name','$u_location','$u_country')";
        if(mysqli_query($con,$sql)){
            $show_id ='SELECT * FROM university ORDER BY uid DESC LIMIT 1';
            $result = mysqli_query($con,$show_id);
            while ($rows = mysqli_fetch_object($result)) {
                $newid = $rows->uid;
                
        
            }
            $update = "UPDATE students 
                        SET University_id='$newid'
                        WHERE 
                        sid = '$sid'";
            if(mysqli_query($con,$update)){
                $data['students']['sid'] = $sid;
                $data['students']['uid'] = $newid;
                $data['students']['status'] = "successful";

                echo json_encode($data);
                
            }else{
                
                echo "error";
            }
        }else{
            echo "error in creating uniuverstiy";
        }



    } else {
        $update = "UPDATE students 
                   SET University_id='$id'
                    WHERE 
                    sid = '$sid'";
        if(mysqli_query($con,$update)){
            $data['students']['sid'] = $sid;
            $data['students']['uid'] = $id;
            $data['students']['status'] = "successful";

            echo json_encode($data);
        }else{
            echo "error";
        }
    }
    
    



};

?>