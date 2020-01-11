
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
        $pid = $dt["pid"];
        $pname = $dt["pname"];
        $pdate = $dt["pdate"];
        $trans_id = $dt["trans_id"];
        $status = "";
        $data = [];
        if (empty($pid)) {
            
            $sql ="INSERT INTO `purchage`(`pid`, `pname`, `pdate`, `trans_id`) VALUES('','$pname','$pdate','$trans_id')";
            if(mysqli_query($con,$sql)){
            $show_id ='SELECT * FROM purchage ORDER BY pid DESC LIMIT 1';
            $result = mysqli_query($con,$show_id);
            while ($rows = mysqli_fetch_object($result)) {
                $newid = $rows->pid;
                }
                $update = "UPDATE students 
                            SET purchage_id='$newid'
                            WHERE 
                            sid = '$sid'";
                if(mysqli_query($con,$update)){
                $data['students']['sid'] = $sid;
                $data['students']['pid'] = $newid;
                $data['students']['status'] = "successful";

                echo json_encode($data);   
            }else{
                
                echo "error";
            }
            }else{
            echo "error in creating purchage";
            }




    } else {
        $update = "UPDATE students 
                   SET purchage_id='$pid'
                    WHERE 
                    sid = '$sid'";
        if(mysqli_query($con,$update)){
            $data['students']['sid'] = $sid;
            $data['students']['pid'] = $pid;
            $data['students']['status'] = "successful";

            echo json_encode($data);
        }else{
            echo "error";
        }
    }
    

};
?>