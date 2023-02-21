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
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    </head>
    <body class="sb-nav-fixed" ng-controller="studentsCtrl">
        <?php include('header.php'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include('sidebar.php'); ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 mb-4">Edit Employee</h1>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-chart-area me-1"></i>
                                      Edit Employee Details
                                    </div>
                                    <div class="card-body"><!-- Place Holder for Add Student-->  
									<form id="myForm" name="myForm" method="post" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                            <div class="col-md-6">
													<select class="form-control form-select-sm" id="sid" ng-model="sid" ng-change="viewStaffedit()">
													<option value="">Select Any One</option>
													<option ng-repeat="aEmployee in allEmployee" value="{{aEmployee.sid}}">{{aEmployee.staff_name}}</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="staff_name" type="text" ng-model="getStudentByEdit.staff_name" required/>
                                                    <label for="staff_name">First name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="Sur_name" type="text" ng-model="getStudentByEdit.Sur_name" required/>
                                                    <label for="Sur_name">Last name</label>
                                                </div>
                                            </div>
                                        </div>
											<div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="contact" type="text" ng-model="getStudentByEdit.contact" required/>
                                                    <label for="contact">Mobile Number</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="contact1" type="text" ng-model="getStudentByEdit.contact1" required/>
                                                    <label for="contact1">Secondary Mobile Number</label>
                                                </div>
                                            </div>
                                        </div>
                                   
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="dob" ng-model="getStudentByEdit.dob" ng-value="getStudentByEdit.dob" type="date" required/>  
                                                    <label for="dob">Date of Birth</label>   
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="inputEmail" ng-model="getStudentByEdit.email" type="email" required/>
                                                    <label for="inputEmail">Email address</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-control form-select-sm" id="gender" ng-model="getStudentByEdit.gender" required>
                                                        <option>Choose</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                     
                                                      </select><label for="gender">Gender</label> 
                                                </div>
                                            </div>
                                            <div class="col-md-6"><div class="form-floating">
                                                    <input class="form-control" id="qualification" type="text" ng-model="getStudentByEdit.qualification" required/>
                                                    <label for="qualification">qualification</label>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6"> <div class="form-floating">
                                                    <input class="form-control" id="address" type="text" ng-model="getStudentByEdit.address" required/>
                                                    <label for="Designation">address</label>
                                                </div>
                                               
                                            </div>
                                            <div class="col-md-6"> <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="doj" type="date" ng-model="getStudentByEdit.doj" ng-value="getStudentByEdit.doj" type="date" required/>
                                                    <label for="doj">Joing Date</label>    
                                                </div>
                                                
                                            </div>
											 
                                        </div> <div class="row mb-3"><div class="col-md-6">
                                              <div class="form-floating">
                                                    <select class="form-control form-select-sm" id="job_type" ng-model="getStudentByEdit.job_type" required>
                                                        <option>Choose</option>
                                                        <option>Full Time</option>
                                                        <option>Part Time</option>
                                                     
                                                      </select>
                                                      <label for="job_type">Job Type</label> 
                                                </div>   
                                            </div>
											 <div class="col-md-6">
                                              <div class="form-floating">
                                                    <input class="form-control" id="Designation" type="text" ng-model="getStudentByEdit.Designation" required/>
                                                    <label for="Designation">Designation</label>
                                                </div>
                                            </div> </div><div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="reportingto" type="text" ng-model="getStudentByEdit.reportingto" required/>
                                                    <label for="reportingto">Reporting </label> 
                                                </div>
                                            </div>
                                           
										   <div class="col-md-6">
                                                <div class="form-floating">
                                                <select class="form-control form-select-sm" id="centre" ng-model="getStudentByEdit.centre" required>
                                                        <option value="">Select Any One</option>
														<option ng-repeat="x in AllCentre" value="{{x.center}}">{{x.center}}</option>
                                                     
                                                      </select>
                                                      <label for="centre">Center </label> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="aadhar" type="text" ng-model="getStudentByEdit.aadhar" required/>
                                                    <label for="aadhar">Enter Aadhar Number</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-control form-select-sm" id="staff_type" ng-model="getStudentByEdit.staff_type" required>
                                                        <option value="">Select Any One</option>
                                                        <option value="Counsellor">Counsellor</option>
                                                        <option value="Faculty">Faculty</option>
                                                        <option value="Counsellor">Counsellor</option>
                                                        <option value="Sales">Sales</option>
                                                        <option value="Others">Others</option>
                                                     
                                                      </select>
                                                      <label for="staff_type">Choose Employee Type </label> 
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6"><div class="input-group">
                                                    <input type="file" class="form-control" id="aadharImage" ng-model="getStudentByEdit.aadharImage">
                                                    <label class="input-group-text bg-info" for="aadharImage">Upload Aadhar</label>
                                                  </div>
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="photo" ng-model="getStudentByEdit.photo">
                                                    <label class="input-group-text bg-info" for="photo">Upload photo</label>
                                                  </div>
                                            </div>
                                            <span class="small text-danger" >Note: Image should be less than 25kb. Only JPG, PNG format allowed</span>
                                        </div>
                                      
                                       
                                        <div class="mt-1 mb-0">
                                            <div class="d-grid"><button class="btn btn-primary btn-block" ng-click="updateEmployee()">Update Employee</button></div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                <div class="card mb-4">
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
                                </div></div>
                               
                            </div>    <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-chart-bar me-1"></i>
                                       Employee List
                                    </div>
                                    <div class="card-body"><!--<canvas id="myBarChart" width="100%" height="40"></canvas>-->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>   
                                                <th>Emp Id</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Job Type</th>
                                                <th>Centre</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <tr ng-repeat="enr in allEmployee">
                                                <td ng-bind="$index+1"></td>
												<td ng-bind="enr.sid"></td>
                                                <td ng-bind="enr.staff_name"></td>
                                                <td ng-bind="enr.contact"></td>
                                                <td ng-bind="enr.job_type"></td>
                                                <td ng-bind="enr.centre"></td>
												<td><button type="button" ng-click="deleteStaff(enr.sid)">Del</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
									</div>
                                </div>
                            </div>
                        </div>
                   

                       </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
		<script src="dist/customjs/addEmployee.js"></script>
    </body>
</html>
