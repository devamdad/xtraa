

<!-- code for groups.php page-->
<?php
    if (isset($_POST['add_uni'])) {
        /* validating information*/ 
        $u_name = $_POST['u_name'];
       
        $u_location = $_POST['u_location'];

        $u_country = $_POST['u_country'];
        
       
        
        /// Database Linking ///
		require_once('db_connection.php');
        $db_connt = db_connect();
        
        $sql_insert = "INSERT INTO `university` (`uid`, `u_name`, `u_location`, `u_country`) VALUES (NULL, '$u_name', '$u_location','$u_country')";
    
        /// SQL Action ///
        $result= mysqli_query($db_connt,$sql_insert);
        
        if(mysqli_error($db_connt)){
			echo 'Error: '.mysqli_error($db_connt);
		}else{
			//$success = 'product insert Complete Successfully';
			//header('Location: add-products.php?success='.$success);
			header('Location:university.php');
        }
        }
        else{
		
		
		}
	 
    
?>