<?php
include('header.php'); 
?>
<?php
    require_once('db_connection.php');
    $con = db_connect();
    // define how many results you want per page
    $results_per_page = 10;
    // find out the number of results stored in database
  

    $count='SELECT * FROM students';
   
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
        
        $sql = "SELECT * FROM students WHERE CONCAT(`s_name`, `alias`, `gender`,  `edu_start`,`duration`, `interest`) LIKE  '%".$searchKey."%'";
       
        
    } else {
        $sql='SELECT * FROM students LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
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
					<div class=" sideMenu" >
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

                    <div class="col-sm-3 float-right"  type=""  data-toggle="modal" data-target="#exampleModal">
                        <img  src="image/plus.PNG" alt="add icon" style="width:40px; hiegth:40px; margin-left:90px;">
                        <h4 style="margin-left:10px;">Add Student</h4>
                        

                        
                    </div>
                    <div class="col-sm-12 float-left pt-4 pb-2" style="overflow:hidden; box-shadow: -4px -13px 18px -13px rgba(0,0,0,0.5); background-color:white;" >
                         
                         
                         
                         <!--searchbox form   students.php?search_results_for=<php echo $searchKey;?>-->
                         <form action="" method="POST">
                         Filter<input class="seachBox" name="search" type="input" placeholder="<?php echo $searchKey;?>">
                         
                          </form> 




                        <div   class=" col-sm-12 float-right pt-5  " style="overflow-y: auto;  ">
                            <table class="table table-bordered " style="with:100%; border: 1px solid #0b0b0b !important;">
                                <thead style="background-color: #e6e6e6; color: black;">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Alius</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Start Education</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Interests</th>
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
                              <td style="display:none;"><?php echo $rows->sid; ?></td>
						      <td scope="row"><?php echo $rows->s_name; ?></td>
						      <td><?php echo $rows->alias; ?></td>
						      <td><?php echo $rows->gender; ?></td>
						      <td><?php echo $rows->edu_start; ?></td>
						      <td><?php echo $rows->duration; ?></td>
						      <td><?php echo $rows->interest; ?></td>
                              <td>
                                <!--  dropdown button -->
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
                                        echo '<li class="page-item"><a style="color:#15910d;" class="page-link"  href="students.php?page=' . $prev . '">' . 'Previous' . '</a> '; 

                                    ?>
                                    
                                    <?php
                                        for ($page=1;$page<=$number_of_pages;$page++) {
                                            echo '<li class="page-item"><a style="color:#15910d;" class="page-link"  href="students.php?page=' . $page . '">' . $page . '</a> ';
                                        }
                                    ?>
                                    <?php
                                        echo '<li class="page-item"><a style="color:#15910d;" class="page-link"  href="students.php?page=' . $next . '">' . 'Next' . '</a> '; 

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



 <!-- Modal for add students  -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="validate_student.php" method="POST">
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input name="full_name" type="text" class="form-control" id="full_name" placeholder="Daniel Y. Cortez" required>
                </div>

                <div class="form-group">
                    <label for="alias">Alias</label>
                    <input name="alias" type="text" class="form-control" id="alias" placeholder="john">
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    
                    <select name="gender" class="form-control" id="gender" >
                    <option>male</option>
                    <option>female</option>
                    
                    </select>           
                </div>
                <div class="form-group">
                    <label for="start_edu">Start Education</label>
                    
                    <select name="start_edu" class="form-control" id="start_edu" >
                    <option>Winter 2019/20</option>
                    <option>Summer 2019</option>
                    <option>Winter 2018/19</option>
                    <option>Summer 2018</option>
                    <option>Winter 2017/18</option>
                    <option>Summer 2017</option>
                    <option>Winter 2016/17</option>
                    <option>Summer 2016</option>
                    <option>Winter 2015/16</option>
                    <option>Summer 2015</option>
                    <option>Winter 2014/15</option>
                    <option>Summer 2014</option>
                    <option>Winter 2013/14</option>
                    <option>Summer 2013</option>
                    <option>Winter 2012/13</option>
                    <option>Summer 2012</option>
                    <option>Winter 2011/12</option>
                    <option>Summer 2011</option>
                    <option>Winter 2010/11</option>
                    <option>Summer 2010</option>
                    <option>Winter 2009/10</option>
                    <option>Summer 2009</option>
                    <option>Winter 2008/09</option>
                    <option>Summer 2008</option>
                    <option>Winter 2007/08</option>
                    <option>Summer 2007</option>
                    <option>Winter 2006/07</option>
                    <option>Summer 2006</option>
                    <option>Winter 2005/06</option>
                    <option>Summer 2005</option>
                    <option>Winter 2004/05</option>
                    <option>Summer 2004</option>
                     </select>           
                </div>

                

                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="number" name="duration" class="form-control" id="duration" placeholder="Years">
                </div>

                <div class="form-group">
                    <label for="interest">Interests</label>
                    <input type="text" name="interest" class="form-control" id="interest" placeholder="Biology">
                </div>
                <button type="submit" class="btn btn-success btn-sm float-right" name="student_add">Add Student</button>
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
				        <h5 class="modal-title" id="exampleModalLabel"> Edit Student </h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>

				        <form action="udpateStudent.php" method="POST">

				            <div class="modal-body">
                             <input type="hidden" name="s_id" id="s_id">

                                <div class="form-group">
                                    <label for="fullname">Full Name :</label>
                                    <input name="full_name" type="text" class="form-control" id="fullname" placeholder="" >
                                </div>
                                <div class="form-group">
                                    <label for="nickName">Alias :</label>
                                    <input name="nickName" type="text" class="form-control" id="nickName" placeholder="" >
                                </div>

                                <div class="form-group">
                                    <label for="gend">Gender</label>
                                    
                                    <select name="gend" class="form-control" id="gend" >
                                    <option>male</option>
                                    <option>female</option>
                                    
                                    </select>           
                                </div>

                                <div class="form-group">
                                    <label for="start_education">Start Education :</label>
                                    <input name ="start_education" type="date" class="form-control" id="start_education" placeholder="" >
                                </div>

                                <div class="form-group">
                                    <label for="durr">Duration :</label>
                                    <input type="number" name="durr" class="form-control" id="durr" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="interests">Interests :</label>
                                    <input type="text" name="interests" class="form-control" id="interests" placeholder="">
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

					        <form action="deleteStudent.php" method="POST">

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

            $('#s_id').val(data[0]);
            $('#fullname').val(data[1]);
            $('#nickName').val(data[2]);
            $('#gend').val(data[3]);
            $('#start_education').val(data[4]);
            $('#durr').val(data[5]);
            $('#interests').val(data[6]);
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