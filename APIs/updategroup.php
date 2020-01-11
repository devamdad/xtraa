
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
        $gid = $dt["gid"];
        $gname = $dt["gname"];
        $g_pinid = $dt["g_pinid"];
       
        
        $status = "";
        $data = [];
        
        if (empty($gid)) {
            
            $sql ="INSERT INTO `groups`(`gid`, `gname`, `g_pinid`) VALUES('','$gname','$g_pinid')";
            if(mysqli_query($con,$sql)){
            $show_id ='SELECT * FROM groups ORDER BY gid DESC LIMIT 1';
            $result = mysqli_query($con,$show_id);
            while ($rows = mysqli_fetch_object($result)) {
                $newid = $rows->gid;
                }
                $update = "UPDATE students 
                            SET group_id='$newid'
                            WHERE 
                            sid = '$sid'";
                if(mysqli_query($con,$update)){
                $data['students']['sid'] = $sid;
                $data['students']['gid'] = $newid;
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
                   SET group_id='$gid'
                    WHERE 
                    sid = '$sid'";
        if(mysqli_query($con,$update)){
            $data['students']['sid'] = $sid;
            $data['students']['gid'] = $gid;
            $data['students']['status'] = "successful";

            echo json_encode($data);
        }else{
            echo "error";
        }
    }
    

};
?>