

<!-- code for groups.php page-->
<?php
    if (isset($_POST['add_intern'])) {
        /* validating information*/ 
        $intern_title = $_POST['intern_title'];
       
        $discription = $_POST['discription'];

        $type = $_POST['type'];
        
       
        
        /// Database Linking ///
		require_once('db_connection.php');
        $db_connt = db_connect();
        
        $sql_insert = "INSERT INTO `internship` (`intern_id`, `intern_title`, `discription`, `type`, `intern_date`) VALUES ('', '$intern_title', '$discription','$type',now())";
    
        /// SQL Action ///
        $result= mysqli_query($db_connt,$sql_insert);
        
        if(mysqli_error($db_connt)){
			echo 'Error: '.mysqli_error($db_connt);
		}else{
			//$success = 'product insert Complete Successfully';
			//header('Location: add-products.php?success='.$success);
			header('Location:internship.php');
        }
        }
        else{
		
		
		}
	 
    
?>