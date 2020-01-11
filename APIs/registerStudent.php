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
        $name = $dt["username"];
        $pass = $dt["password"];
        $data = array();
        $sql ="INSERT INTO `students`(`username`, `password`) VALUES('$name','$pass')";
        if(mysqli_query($con,$sql)){
            $show_id ='SELECT * FROM students ORDER BY sid DESC LIMIT 1';
            $result = mysqli_query($con,$show_id);
           
              while ($rows = mysqli_fetch_object($result)) {
                $data['students']['id'] = $rows->sid;
                
        
            }
            echo json_encode($data);
        }else{
            echo "no data inserted";
        }
    


    };

?>