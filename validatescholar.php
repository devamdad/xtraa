

<!-- code for groups.php page-->
<?php
    if (isset($_POST['add_scholar'])) {
        /* validating information*/ 
        $title = $_POST['title'];
       
        $discription = $_POST['discription'];

        
       
        
        /// Database Linking ///
		require_once('db_connection.php');
        $db_connt = db_connect();
        
        $sql_insert = "INSERT INTO  `scholarships` (`scholar_id`, `title`, `discription`, `cdate`) VALUES ('', '$title', '$discription',now())";
    
        /// SQL Action ///
        $result= mysqli_query($db_connt,$sql_insert);
        
        if(mysqli_error($db_connt)){
			echo 'Error: '.mysqli_error($db_connt);
		}else{
			//$success = 'product insert Complete Successfully';
			//header('Location: add-products.php?success='.$success);
			header('Location:scholarships.php');
        }
        }
        else{
		
		
		}
	 
    
?>