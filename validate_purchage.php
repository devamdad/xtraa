

<!-- code for groups.php page-->
<?php
    if (isset($_POST['purchage_add'])) {
        /* validating information*/ 
        $p_name = $_POST['p_name'];
       
        $p_date = $_POST['p_date'];

        $trans_id = $_POST['trans_id'];
        
       
        
        /// Database Linking ///
		require_once('db_connection.php');
        $db_connt = db_connect();
        
        $sql_insert = "INSERT INTO `purchage` (`pid`, `pname`, `pdate`, `trans_id`) VALUES (NULL, '$p_name', '$p_date','$trans_id ')";
    
        /// SQL Action ///
        $result= mysqli_query($db_connt,$sql_insert);
        
        if(mysqli_error($db_connt)){
			echo 'Error: '.mysqli_error($db_connt);
		}else{
			//$success = 'product insert Complete Successfully';
			//header('Location: add-products.php?success='.$success);
			header('Location:purchage.php');
        }
        }
        else{
		
		
		}
	 
    
?>