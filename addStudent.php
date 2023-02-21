<!DOCTYPE html>
<html lang="en" ng-app="appname">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Galaxy Exam Portal</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
		
		<link rel="stylesheet" href="dist/css/bootstrap.min.css" />	
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    </head>
    <body ng-controller="studentsCtrl" class="sb-nav-fixed">
        <?php include('header.php'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include('sidebar.php'); ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 mb-4">Enquiry</h1>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-chart-area me-1"></i>
                                      Add Student/Enquiry
                                    </div>
                                    <div class="card-body"><!-- Place Holder for Add Student-->  
									<form id="myForm" name="myForm" method="post" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="name" ng-model="aStudent.name" type="text" placeholder="Enter your first name" required/>
                                                    <label for="name">Your name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="parent_name" ng-model="aStudent.parent_name" type="text" placeholder="Enter your Parent name" required/>
                                                    <label for="parent_name">Parent Name name</label>
                                                </div>
                                            </div>
                                        </div>
										 <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="institution" ng-model="aStudent.institution" type="text" placeholder="Enter your Mobile Number" required/>
                                                    <label for="institution">Institution</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="qualification" ng-model="aStudent.qualification" type="text" placeholder="Enter your Father Number" required/>
                                                    <label for="qualification">Qualification</label>
                                                </div>
                                            </div>
                                        </div>
										
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="student_mobile" ng-model="aStudent.student_mobile" type="text" minlength="10" maxlength="10" placeholder="Student Mobile" required/>
                                                    <label for="student_mobile">student_mobile</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="parent_mobile" ng-model="aStudent.parent_mobile" type="text" maxlength="10" placeholder="Parent Mobile" required/>
                                                    <label for="parent_mobile">parent_mobile</label> 
                                                </div>
                                            </div>
                                        </div>
										
										<div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" ng-model="aStudent.enquiry_date" id="enquiry_date" name="enquiry_date" type="date" required/>
                                                    <label for="enquiry_date">Enquiry date</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="dob" ng-model="aStudent.dob" name="dob" type="date" required/>
                                                    <label for="inputEmail">Dob</label>
                                                </div>
                                            </div>
                                        </div>
										<div class="row mb-3">
											<div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="Email" ng-model="aStudent.email" name="email" type="text" 
                                                    placeholder="What Is your Email" ng-pattern="/^[a-z]+[a-z0-9._]+@[a-z]+\.[a-z.]{2,5}$/" required/>
                                                    <label for="email">email</label>
                                                    <span class="error" ng-show="myForm.input.$error.pattern"> Invalid email!</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
													<select class="form-control form-select-sm" id="source" ng-model="aStudent.source" required>
                                                        <option value="">Select Any One</option>
														<option value="Database">Database</option>
														<option value="Justdial">Justdial</option>
														<option value="Institutional referrals">Institutional Referrals</option>
														<option value="Google">Google</option>
														<option value="Website">Website</option>
														<option value="Social Media">Social Media</option>
														<option value="Flyers">Flyers</option>
														<option value="Coupons">Coupons</option>
														<option value="Students Referral">Students Referral</option>
														<option value="Seminars">Seminars</option>
														<option value="Event">Event</option>
														<option value="Education Fairs">Education Fairs</option>
                                                       
                                                    </select> <label for="Source">Source</label>                                           
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-control form-select-sm" id="course" ng-model="aStudent.course" required>
                                                        
														<option value="">Select Any One</option>
														<option ng-repeat="x in AllCourse" value="{{x.c_id}}">{{x.course}}</option>
                                                     
                                                    </select>
                                                    <label for="course">Course Applying For</label> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-control form-select-sm" id="program" ng-model="aStudent.program" required>
                                                        <option value="">Select Any One</option>
														<option ng-repeat="x in AllProgram" value="{{x.pid}}">{{x.program_name}}</option>
                                                       
                                                      </select> <label for="program">Program</label> 
                                                </div>
                                            </div>
                                        </div>
                                        
										<div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-control form-select-sm" id="gender" name="gender" ng-model="aStudent.gender" required>
                                                        <option value="">Select Any One</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                     
                                                      </select> <label for="Gender">Gender</label> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
												<div class="form-floating mb-3 mb-md-0">
													<select class="form-control form-select-sm" name="prefered_country" id="prefered_country" ng-model="aStudent.prefered_country" required>
														<option value="">Select Any One</option>
                                                        <option Value="UK">UK</option>
														<option Value="France">France</option>
														<option Value="USA">USA</option>
														<option Value="Canada">Canada</option>
														<option Value="Australia">Australia</option>
														<option Value="New-Zealand">New-Zealand</option>
														<option Value="Singapore">Singapore</option>
														<option Value="Ireland">Ireland</option>
														<option Value="Germany">Germany</option>
														<option Value="Switzerland">Switzerland</option>
														<option Value="Spain">Spain</option>
														<option Value="Dubai">Dubai</option>
														<option Value="Malaysia">Malaysia</option>
														<option Value="Mauritius">Mauritius</option>
														<option Value="Netherlands">Netherlands</option>
														<option Value="Italy">Italy</option>
                                                       
                                                    </select> <label for="Country">Prefered Country</label> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="counsellor_id" ng-model="aStudent.counsellor_id" type="text" placeholder="Which Course Applying for" required/>
                                                    <label for="counsellor_id">Counsellor ID</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="counsellor_name" ng-model="aStudent.counsellor_name" type="text" placeholder="What Is your Qualification" required/>
                                                    <label for="counsellor_name">Counsellor Name</label>
                                                </div>
                                            </div>
                                        </div>
										<div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-control form-select-sm" id="centre" ng-model="aStudent.centre" required>
                                                        <option value="">Select Any One</option>
														<option ng-repeat="x in AllCentre" value="{{x.cid}}">{{x.center}}</option>
                                                     
                                                      </select>
                                                      <label for="course">Center</label> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <textarea class="form-control" placeholder="Leave a comment here" id="remarks" ng-model="aStudent.remarks" style="height: 100px"></textarea>
													<label for="course">Comments</label> 
                                                </div>
                                            </div>
                                        </div>
										<div class="row mb-3">
											<div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <textarea class="form-control" placeholder="Leave a comment here" id="address" ng-model="aStudent.address" style="height: 100px" required></textarea>
													<label for="course">Address</label> 
                                                </div>
                                            </div>
                                        </div>
										

                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
												<button class="btn btn-primary btn-block" ng-click="saveEnquiry()">Add Enquiry</button>
											</div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                <!--<div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-chart-bar me-1"></i>
                                       Bulk Upload
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3"><a class="btn btn-success" href="superadmindashboard.html">Download Sample Excel File</a></div>
                                    <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile02">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                  </div>
                                </div>
								</div>-->
                               
                            </div>    
							<div class="col-xl-6">
								<div class="row">
									<div class="col-md-4">
										<input class="form-control" id="myInput" onkeyup="myFunction()" type="text" placeholder="Search Name" required/>
									</div>
								</div>
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-chart-bar me-1"></i>
                                       Enquiry List
                                    </div>
                                    <div class="card-body">
									<!--<table id="datatablesSimple1">-->
									<table class="table table-striped table-bordered" id="myTable">
                                        <thead>
                                            <tr>
												<th>Sno</th>
                                                <th>Enquiry Id</th>
												<th>Name</th>
                                                <th>Institution</th>                                           
                                                <th>Student_mobile</th>
                                                <th>Course</th>
                                                <th>Centre</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>

											<tr ng-repeat="Enquiry in filtered = (AllEnquiry | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                                                <td ng-bind="$index+1"></td>
												<td ng-bind="Enquiry.StId"></td>
												<td ng-bind="Enquiry.name"></td>
												<td ng-bind="Enquiry.institution"></td>
												<td ng-bind="Enquiry.student_mobile"></td>
												<td ng-bind="Enquiry.course"></td>
												<td ng-bind="Enquiry.center"></td>
                                            </tr>
                                            
                                       
                                        </tbody>
                                    </table>
										<div class="col-md-6 text-center">
											<ul uib-pagination boundary-links="true" boundary-link-numbers="true" ng-change="setPage(page)" max-size="maxSize" total-items="filtered.length" ng-model="page"  class="pagination-sm" previous-text="&lsaquo;" next-text="&rsaquo;" first-text="&laquo;" last-text="&raquo;"></ul>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                   

                       </div>
					   <form class="form-horizontal well" action="studentenquirybulkupload.php" method="post" name="upload_excel" enctype="multipart/form-data">
				<div class="col-xl-6">
				<div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-chart-bar me-1"></i>
                                       Bulk Upload
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3"><a class="btn btn-success" href="studentenquiryexport.php">Download Sample Excel File</a></div>
                                    <div class="input-group mb-3">
                                   	<input type="file" name="file" id="file" class="form-control" id="inputGroupFile02">
							<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
                                  </div>
                                </div></div>
								</div>
					
				</form>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Galaxytraining.in 2021</div><div class="text-muted">Powered By dreamscreen.co.in</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="dist/js/angular.min.js"></script>
		<script src="dist/js/ui-bootstrap-tpls-0.14.3.js"></script>	
		<script src="dist/customjs/newStudents.js"></script>
		<!--<script src="dist/js/angular-1.4.8.min.js"></script>-->
	
</body>
</html>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

</script>