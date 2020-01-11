
<?php
 header('content-type:application/json');    
    $request = $_SERVER['REQUEST_METHOD'];

    switch($request){
        case 'PUT':
            $dt = json_decode(file_get_contents('php://input'),true);
            putRuquest($dt);
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

    function putRuquest($dt){
        require_once('../db_connection.php');
        $con = db_connect();
        $sid= $dt["sid"];
        $cid = $dt["cid"];
        $c_name = $dt["c_name"];
        $degree = $dt["degree"];
        $cp_id = $dt["cp_id"];
        $status = "";
        $data = [];
        
        if (empty($cid)) {
            
            $sql ="INSERT INTO `courses`(`cid`, `c_name`, `degree`, `pinid`) VALUES('','$c_name','$cp_id','$degree')";
            if(mysqli_query($con,$sql)){
            $show_id ='SELECT * FROM courses ORDER BY cid DESC LIMIT 1';
            $result = mysqli_query($con,$show_id);
            while ($rows = mysqli_fetch_object($result)) {
                $newid = $rows->cid;
                }
                $update = "UPDATE students 
                            SET course_id='$newid'
                            WHERE 
                            sid = '$sid'";
                if(mysqli_query($con,$update)){
                $data['students']['sid'] = $sid;
                $data['students']['cid'] = $newid;
                $data['students']['status'] = "successful";

                echo json_encode($data);   
            }else{
                
                echo "error";
            }
            }else{
            echo "error in creating Courses";
            }




    } else {
        $update = "UPDATE students 
                   SET course_id='$cid'
                    WHERE 
                    sid = '$sid'";
        if(mysqli_query($con,$update)){
            $data['students']['sid'] = $sid;
            $data['students']['ucidid'] = $cid;
            $data['students']['status'] = "successful";

            echo json_encode($data);
        }else{
            echo "error";
        }
    }
    

};
?>