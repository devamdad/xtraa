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
        $sql='SELECT * FROM students';
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $data = [];
            while ($rows = mysqli_fetch_object($result)) {
                $data['students'][] = $rows;
    
            }
            
            echo json_encode($data);
                        
        } else {
             echo "no data found";
        }
    }







    /* PUT FUNCTION */

    function putRuquest($dt){
        require_once('../db_connection.php');
        $con = db_connect();
        $id = $dt["sid"];
        $name = $dt["username"];
        $s_name = $dt["s_name"];
        $alias = $dt["alias"];
        $gender = $dt["gender"];
        $edu_start = $dt["edu_start"];
        $duration = $dt["duration"];
        $interest = "";
        $c = $dt["interest"];
        $count = count($c);
        $status = "";
        
        if ($count > 0) {
            for($i=0; $i < $count ; $i++){
                $interest .= $c[$i].",";
                
            }
            
        } else {
            $interest = "";
        }
        
       
       
      
        
        
     
        $sql ="UPDATE students
                SET s_name='$s_name',
                    alias='$alias',
                    gender='$gender',
                    edu_start='$edu_start',
                    duration='$duration',
                    interest='$interest'
                    WHERE 
                    sid = '$id'";
        if(mysqli_query($con,$sql)){
            $status = true;
            
            echo json_encode($status);
          
        }else{
            $status = false;
            
            echo json_encode($status);
        }
    


    };
 

     

     


     


     


     
     




   

?>