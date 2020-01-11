<?php
include('header.php'); ?>
    <!- side menu ->
    
    <div class="">
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
				<div class="col-sm-9 float-right mt-5 pt-2" >
					<div class="dashView col-sm-12 " >
						<a href="students.php"><div class="float-left dashbar py-3" >
							<div class="dash_cat">
								<div class="dash_name">
									<h6 class="text-center">Student</h6>
									
								</div>
								<div class="dash_notify">
								<?php require_once('db_connection.php');
								 $con = db_connect();
								 $show_id ='SELECT * FROM purchage ';
								 $result = mysqli_query($con,$show_id);
								 $students= mysqli_num_rows($result);
								 ?>
									<h6 class="text-center"><?php echo $students;?></h6>
								</div>
							</div>
						    
						</div>
						</a>

						<a href="university.php">
							<div class="float-left dashbar py-3" >
								<div class="dash_cat">
									<div class="dash_name">
										<h6 class="text-center">University</h6>
										
									</div>
									<?php
									$show_id ='SELECT * FROM university ';
									$result = mysqli_query($con,$show_id);
									$university= mysqli_num_rows($result);
									
									
									?>
									<div class="dash_notify">
										<h6 class="text-center"><?php echo $university;?></h6>
									</div>
								</div>
						    
							</div>
						</a>


						<a href="courses.php"><div class="float-left dashbar py-3" >
							<div class="dash_cat">
								<div class="dash_name">
									<h6 class="text-center">Courses</h6>
									
								</div>
								<?php
									$show_id ='SELECT * FROM courses ';
									$result = mysqli_query($con,$show_id);
									$courses= mysqli_num_rows($result);
									
									
									?>
									<div class="dash_notify">
										<h6 class="text-center"><?php echo $courses;?></h6>
									</div>
							</div>
						    
						</div>
						</a>
						
						
						<a href="groups.php"><div class="float-left dashbar py-3" >
							<div class="dash_cat">
								<div class="dash_name">
									<h6 class="text-center">Groups</h6>
									
								</div>
								<?php
									$show_id ='SELECT * FROM groups ';
									$result = mysqli_query($con,$show_id);
									$groups= mysqli_num_rows($result);
									
									
									?>
									<div class="dash_notify">
										<h6 class="text-center"><?php echo $groups;?></h6>
									</div>
							</div>
						    
						</div>
						</a>


						<a href="purchage.php"><div class="float-left dashbar py-3" >
							<div class="dash_cat">
								<div class="dash_name">
									<h6 class="text-center">Purchage</h6>
									
								</div>
								<?php
									$show_id ='SELECT * FROM purchage ';
									$result = mysqli_query($con,$show_id);
									$purchage= mysqli_num_rows($result);
									
									
									?>
									<div class="dash_notify">
										<h6 class="text-center"><?php echo $purchage;?></h6>
									</div>
							</div>
						    
						</div>
						</a>



						<a href="career.php"><div class="float-left dashbar py-3" >
							<div class="dash_cat">
								<div class="dash_name">
									<h6 class="text-center">Career Portal</h6>
									
								</div>
								<?php
									$show_id ='SELECT * FROM internship ';
									$result = mysqli_query($con,$show_id);
									$career= mysqli_num_rows($result);

									$newid ='SELECT * FROM scholarships ';
									$result = mysqli_query($con,$show_id);
									$newadd= mysqli_num_rows($result);

									$careertotal = $career +$newadd;
									
									
									?>
									<div class="dash_notify">
										<h6 class="text-center"><?php echo $careertotal;?></h6>
									</div>
							</div>
						    
						</div>
						</a>



						<a href="post.php"><div class="float-left dashbar py-3" >
							<div class="dash_cat">
								<div class="dash_name">
									<h6 class="text-center">Post</h6>
									
								</div>
								<div class="dash_notify">
								<?php require_once('db_connection.php');
								 $con = db_connect();
								 $show_id ='SELECT * FROM posts ';
								 $result = mysqli_query($con,$show_id);
								 $posts= mysqli_num_rows($result);
								 ?>
									<h6 class="text-center"><?php echo $posts;?></h6>
								</div>
							</div>
						    
						</div>
						</a>
					</div>
				</div>
				
			</div>
		</div>
	</div>
<?php
include('footer.php');
?>