

<!-- code for students.php page-->
<?php
    if (isset($_POST['student_add'])) {
        /* validating information*/ 
        $full_name = $_POST['full_name'];
       
        $alias = $_POST['alias'];
        
        $gender = $_POST['gender'];
        
        $start_edu = $_POST['start_edu'];
       
        $duration = $_POST['duration'];
      
        $interest = $_POST['interest'];
        
        /// Database Linking ///
		require_once('db_connection.php');
        $db_connt = db_connect();
        
        $sql_insert = "INSERT INTO `students` (`sid`, `s_name`, `alias`, `gender`, `edu_start`, `duration`, `interest`) VALUES (NULL, '$full_name', '$alias', '$gender', '$start_edu', '$duration', '$interest')";
    
        /// SQL Action ///
        $result= mysqli_query($db_connt,$sql_insert);
        
        if(mysqli_error($db_connt)){
			echo 'Error: '.mysqli_error($db_connt);
		}else{
			//$success = 'product insert Complete Successfully';
			//header('Location: add-products.php?success='.$success);
			header('Location:students.php');
        }
        }
        else{
		
		
		}
	 
    
?>