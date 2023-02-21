 <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
	<div class="sb-sidenav-menu">
		<div class="nav">
		   <a class="nav-link" href="dashboard.php">
				<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
				Dashboard
			</a>
			<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#studentModule" aria-expanded="false" aria-controls="collapseLayouts">
				<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
				Student Management
				<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
			</a>
			<div class="collapse" id="studentModule" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
				<nav class="sb-sidenav-menu-nested nav">
					<a class="nav-link" href="addStudent.php">Add Enquiry</a>
					<a class="nav-link" href="studentEnrollment.php">Student Enroll</a>
					<a class="nav-link" href="studentdetails.php">View Student</a>
					<a class="nav-link" href="updateStudentEnroll.php">Edit Student</a>
			  </nav>
			</div>
			<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#staffModule" aria-expanded="false" aria-controls="collapseLayouts">
				<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
				Staff Management
				<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
			</a>
			<div class="collapse" id="staffModule" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
				<nav class="sb-sidenav-menu-nested nav">
					<a class="nav-link" href="addEmployee.php">Add Employee</a>
					<a class="nav-link" href="staffdetails.php">View Employee</a>
					<a class="nav-link" href="updateStaff.php">Edit Employee</a>
			  </nav>
			</div>
			<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Question" aria-expanded="false" aria-controls="collapseLayouts">
				<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
				Question Bank
				<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
			</a>
			<div class="collapse" id="Question" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
				<nav class="sb-sidenav-menu-nested nav">
					<a class="nav-link" href="addimagelib.php">Add Image Library</a>
					<a class="nav-link" href="addQuestion.php">Add Question</a>
					<a class="nav-link" href="viewQuestion.php">View Question</a>
				</nav>
			</div>
			<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Questionpapper" aria-expanded="false" aria-controls="collapseLayouts">
				<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
				Question Papper
				<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
			</a>
			<div class="collapse" id="Questionpapper" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
				<nav class="sb-sidenav-menu-nested nav">
					<a class="nav-link" href="addquestionpapper.php">Add Question Papper</a>
					<a class="nav-link" href="addquestionpapperMapping.php">Question Papper Map</a>
				</nav>
			</div>
			<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
				<div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
			  Create Masters
				<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
			</a>
			<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
				<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
					<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
					   Batches
						<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
					</a>
					<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
						<nav class="sb-sidenav-menu-nested nav">
							<a class="nav-link" href="addBatches.php">Create Batch</a>
							<a class="nav-link" href="batchDetails.php">View Batch</a>
							<a class="nav-link" href="updatebatch.php">Update Batch</a>
						</nav>
					</div>
					<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
					   Courses
						<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
					</a>
					<div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
						<nav class="sb-sidenav-menu-nested nav">
							<a class="nav-link" href="addCourse.php">Create Courses</a>
							<a class="nav-link" href="courseDetails.php">View Courses</a>
							<a class="nav-link" href="updatecourse.php">Update Courses</a>
						</nav>
					</div>
					<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#ExamModule" aria-expanded="false" aria-controls="pagesCollapseError">
						Examinations
						 <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
					 </a>
					 <div class="collapse" id="ExamModule" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
						 <nav class="sb-sidenav-menu-nested nav">
							 <a class="nav-link" href="#">Create Exams</a>
							 <a class="nav-link" href="#">Manage Exams</a>
						 </nav>
					 </div>
				</nav>
			</div>
			<div class="sb-sidenav-menu-heading">Reports</div>
			<a class="nav-link" href="reports.php">
				<div class="sb-nav-link-icon"><i class="fas fa-search"></i></div>
				Exam Report
			</a>
		   
		</div>
	</div>
	<div class="sb-sidenav-footer">
		<div class="small">Logged in as:</div>
		Namasivayam
	</div>
</nav>