

<!-- code for groups.php page-->
<?php
    if (isset($_POST['add_course'])) {
        /* validating information*/ 
        $c_name = $_POST['c_name'];
       
        $degree = $_POST['degree'];

        $c_pinid = $_POST['c_pinid'];
        
       
        
        /// Database Linking ///
		require_once('db_connection.php');
        $db_connt = db_connect();
        
        $sql_insert = "INSERT INTO `courses` (`cid`, `c_name`, `degree`, `pinid`) VALUES (NULL, '$c_name', '$degree','$c_pinid')";
    
        /// SQL Action ///
        $result= mysqli_query($db_connt,$sql_insert);
        
        if(mysqli_error($db_connt)){
			echo 'Error: '.mysqli_error($db_connt);
		}else{
			//$success = 'product insert Complete Successfully';
			//header('Location: add-products.php?success='.$success);
			header('Location:courses.php');
        }
        }
        else{
		
		
		}
	 
    
?>