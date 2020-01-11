

<!-- code for groups.php page-->
<?php
    if (isset($_POST['post_add'])) {
        /* validating information*/ 
        $p_title = $_POST['p_title'];
       
        $p_body = $_POST['p_body'];

        
       
        
        /// Database Linking ///
		require_once('db_connection.php');
        $db_connt = db_connect();
        
        $sql_insert = "INSERT INTO `posts` (`post_id`, `p_title`, `p_body`, `c_date`, `status`) VALUES ('', '$p_title', '$p_body',now(),'')";
    
        /// SQL Action ///
        $result= mysqli_query($db_connt,$sql_insert);
        
        if(mysqli_error($db_connt)){
			echo 'Error: '.mysqli_error($db_connt);
		}else{
			//$success = 'product insert Complete Successfully';
			//header('Location: add-products.php?success='.$success);
			header('Location:posts.php');
        }
        }
        else{
		
		
		}
	 
    
?>