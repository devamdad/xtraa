<?php
include('header.php'); ?>
    <!- side menu here->
    
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
					<a href="internship.php"><div class="float-left dashbar py-3" >
							<div class="dash_cat">
								<div class="dash_name">
									<h6 class="text-center">Internship</h6>
									
								</div>
								<div class="dash_notify">
								<?php require_once('db_connection.php');
								 $con = db_connect();
								 $show_id ='SELECT * FROM internship ';
								 $result = mysqli_query($con,$show_id);
								 $internship= mysqli_num_rows($result);
								 ?>
									<h6 class="text-center"><?php echo $internship;?></h6>
								</div>
							</div>
						    
						</div>
						</a>
						<a href="scholarships.php"><div class="float-left dashbar py-3" >
							<div class="dash_cat">
								<div class="dash_name">
									<h6 class="text-center">Scholarships</h6>
									
								</div>
								<div class="dash_notify">
								<?php 
								 $show_id ='SELECT * FROM internship ';
								 $result = mysqli_query($con,$show_id);
								 $internship= mysqli_num_rows($result);
								 ?>
									<h6 class="text-center"><?php echo $internship;?></h6>
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