<?php
include('header.php'); ?>
<?php
    require_once('db_connection.php');
    $con = db_connect();
    // define how many results you want per page
    $results_per_page = 10;
    // find out the number of results stored in database
  

    $count='SELECT * FROM purchage';
   
    $result = mysqli_query($con, $count);
   
    $number_of_results = mysqli_num_rows($result);

    // determine number of total pages available
    $number_of_pages = ceil($number_of_results/$results_per_page);





    
    
    

    // determine which page number visitor is currently on
    if (!isset($_GET['page'])) {
        $page = 1;
        $prev = 1;
        $next = 1;

    } else {
        $page = $_GET['page'];
        $prev = $page - 1;
        $next = $page + 1;
    }
    if($prev == 0){
        $prev = $prev + 1;
    }
   
    

    // determine the sql LIMIT starting number for the results on the displaying page
    $this_page_first_result = ($page-1)*$results_per_page;



    
      // SEACH BOX QUERY
      if( isset( $_POST['search'] ) ) { 
      
        $searchKey = $_POST['search'];
        
        $sql = "SELECT * FROM purchage WHERE CONCAT(`pname`, `pdate`, `trans_id`) LIKE  '%".$searchKey."%'";
       
        
    } else {
        $sql='SELECT * FROM purchage LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
        $searchKey = "search";
    }

    // retrieve selected results from database and display them on page
    //
    $result = mysqli_query($con, $sql);
?>
<style>
/* Forn on focus color change*/

.form-control:focus {
    border-color: #8cc63f;
    box-shadow: inset 0 1px 1px rgba(102,204,51,0.2), 0 0 8px rgba(51,153,0,0.2) !important;
}

</style>
    <!- side menu ->
    
    <div class="student_body">
		<div class="row">
			<div class="col-sm-12">
				<div class="sileMenuSection col-sm-3 float-left">
					<h2>Post/Recent</h2>
					<div class=" sideMenu">
						<div id="logo_menu">
							<img src="image/logo.PNG" alt="icon">
							<h6>XtraSkool</h6>
						</div>
						<a href="dashboard.php" style="border-top: 1px solid #8CC63F;">Dashboard</a>
						<a href="students.php">Students</a>
						<a href="university.php">University</a>
						<a href="courses.php">Courses</a>
						<a href="groups.php">Groups</a>
						<a href="purchage.php">Purchage</a>
						<a href="career.php">Career Portal</a>
						<a href="post.php">Post</a>

					</div>
                </div>
                <div class="col-sm-9 float-right mt-4 " >
                    <div class="col-sm-3 float-right" data-toggle="modal" data-target="#exampleModal">
                        <img  src="image/plus.PNG" alt="add icon" style="width:40px; hiegth:40px; margin-left:90px;">
                        <h4 style="margin-left:10px;">Add Purchage</h4>
                    </div>
                    <div class="col-sm-12 float-left pt-4 pb-5" style="box-shadow: -4px -13px 18px -13px rgba(0,0,0,0.5); background-color:white;" >
                       
                        <!--searchbox form   students.php?search_results_for=<php echo $searchKey;?>-->
                        <form action="" method="POST">
                         Filter<input class="seachBox" name="search" type="input" placeholder="<?php echo $searchKey;?>">
                         
                          </form> 

                        <div   class=" col-sm-12 float-right pt-5  " style="overflow-y: auto;">
                            <table class="table table-bordered " style="with:100%; border: 1px solid #0b0b0b !important;">
                                <thead style="background-color: #e6e6e6; color: black;">
                                    <tr>
                                     
                                        <th scope="col">Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Transaction ID</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                 </thead>
                            <tbody>
                            <!--  fetching all data form databse and displaying all the data in table-->
                            <?php 
								while ($rows = mysqli_fetch_object($result)) 
								{ 
									
							?>
						
                                <tr>
                                    <td style="display:none;"><?php echo $rows->pid; ?></td>
                                    <td><?php echo $rows->pname; ?></td>
						            <td><?php echo $rows->pdate; ?></td>
						            <td><?php echo $rows->trans_id; ?></td>
                                    <!--  dropdown button -->
                                    <td>
                                        <div class=" dropleft">
                                    
                                        <img  class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" src="image/action.PNG" alt="action" style="margin-auto;width:30px;hiegth:30px;">
                                            <div class="dropdown-menu">
                                                <div type="" class="editbtn" data-toggle="modal" data-target="#editmodal"><a class="dropdown-item" href="#"><img  src="image/edit.svg" alt="edit icon" style="width:15px; height:15px; margin-right:2px;">Edit</a></div>
                                                <div type="" class="deletebtn" data-toggle="modal" data-target="#deletebtn"> <a class="dropdown-item" href="#"><img src="image/delete.png" alt="delete icon" style="width:20px; height:20px; margin-right:2px;">Delete</a></div>
                                            </div>
                                        </div>
                                    </td>                              
                                </tr>
                                <?php 
                                }
                            ?>
                           
                            </tbody>
                            </table>
                           <!--display the links to the pages-->
                           <nav aria-label="Page navigation example" class="float-right" >
                                <ul class="pagination" >
                                    <?php
                                        echo '<li class="page-item"><a style="color:#15910d;" class="page-link"  href="purchage.php?page=' . $prev . '">' . 'Previous' . '</a> '; 

                                    ?>
                                    
                                    <?php
                                        for ($page=1;$page<=$number_of_pages;$page++) {
                                            echo '<li class="page-item"><a style="color:#15910d;" class="page-link"  href="purchage.php?page=' . $page . '">' . $page . '</a> ';
                                        }
                                    ?>
                                    <?php
                                        echo '<li class="page-item"><a style="color:#15910d;" class="page-link"  href="purchage.php?page=' . $next . '">' . 'Next' . '</a> '; 

                                    ?>
                                 
                                </ul>
                             </nav>
                        </div>
                    </div>
                </div>
			</div>
				
			</div>
		</div>
    </div>
    
        <!-- Modal for add purchage  -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Purchage</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="validate_purchage.php" method="POST">
                        <div class="form-group">
                            <label for="p_name"> Name</label>
                            <input name="p_name" type="text" class="form-control" id="p_name" placeholder="Daniel Y. Cortez" required>
                        </div>

                       

                        <div class="form-group">
                            <label for="p_date">Date</label>
                            <input name ="p_date" type="date" class="form-control" id="p_date" placeholder="yyyy-mm-dd" required>
                        </div>

                        <div class="form-group">
                            <label for="trans_id">Transection Id</label>
                            <input type="text" name="trans_id" class="form-control" id="trans_id" placeholder="12345">
                        </div>

                        <button type="submit" class="btn btn-success btn-sm float-right" name="purchage_add">Add Purchage</button>
                    </form>
                </div>
                
                    
            
            </div>
        </div>
        </div>

         <!-- EDIT POP UP FORM -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel"> Edit Purchage </h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>

				        <form action="updatePurchage.php" method="POST">

				            <div class="modal-body">
                                <input type="hidden" name="pid" id="pid">
                                <div class="form-group">
                                    <label for="pur_name"> Name</label>
                                    <input name="pur_name" type="text" class="form-control" id="pur_name" placeholder="Daniel Y. Cortez" required>
                                </div>

                            

                                <div class="form-group">
                                    <label for="pur_date">Date</label>
                                    <input name ="pur_date" type="date" class="form-control" id="pur_date" placeholder="yyyy-mm-dd" required>
                                </div>

                                <div class="form-group">
                                    <label for="transaction_id">Transection Id</label>
                                    <input type="text" name="transaction_id" class="form-control" id="transaction_id" placeholder="12345">
                                </div>

                               
                                                
				            </div>
				            <div class="modal-footer">
				                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
				                <button type="submit" name="updatedata" class="btn btn-success btn-sm">Update Data</button>
				            </div>
				        </form>

				    </div>
				  </div>
                </div>






                <!-- DELETE POP UP FORM (Bootstrap MODAL) -->

					<div class="modal fade" id="deletebtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>

					        <form action="deletePurchage.php" method="POST">

					            <div class="modal-body">

					                <input type="hidden" name="delete_id" id="delete_id">

					                <h4 class="text-danger"> Do you want to Delete this Data ??</h4>
					                <small>It can Effect other sections</small>
					            </div>
					            <div class="modal-footer">
					                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">  NO </button>
					                <button type="submit" name="deletedata" class="btn btn-success btn-sm"> Yes!! Delete it. </button>
					            </div>
					        </form>

					    </div>
					  </div>
					</div>
                


<script>

$(document).ready(function () {
    $('.editbtn').on('click', function() {
        
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#pid').val(data[0]);
            $('#pur_name').val(data[1]);
            $('#pur_date').val(data[2]);
            $('#transaction_id').val(data[3]);
           
          
    });
});


</script>



<script>

$(document).ready(function () {

    $('.deletebtn').on('click', function() {
        
        

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);
       
      
    });
});

</script>
<?php
include('footer.php');
?>