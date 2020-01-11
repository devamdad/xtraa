

<!-- code for groups.php page-->
<?php
    if (isset($_POST['group_add'])) {
        /* validating information*/ 
        $g_name = $_POST['g_name'];
       
        $g_pinid = $_POST['g_pinid'];
        
       
        
        /// Database Linking ///
		require_once('db_connection.php');
        $db_connt = db_connect();
        
        $sql_insert = "INSERT INTO `groups` (`gid`, `gname`, `g_pinid`) VALUES (NULL, '$g_name', '$g_pinid')";
    
        /// SQL Action ///
        $result= mysqli_query($db_connt,$sql_insert);
        
        if(mysqli_error($db_connt)){
			echo 'Error: '.mysqli_error($db_connt);
		}else{
			//$success = 'product insert Complete Successfully';
			//header('Location: add-products.php?success='.$success);
			header('Location:groups.php');
        }
        }
        else{
		
		
		}
	 
    
?>