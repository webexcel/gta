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
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-resource.min.js"></script>
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
                        <h1 class="mt-4 mb-4">Enrollment</h1>
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
                                                
                                               
												  <select class="form-control form-select-sm" ng-model="eStudent.stId" id="stId" >
												  <option ng-repeat="Enquiry in AllEnquiry" value="{{Enquiry.StId}}">{{Enquiry.name}}</option>
                                                      </select>
												 
                                            </div>
                                    
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-control form-select-sm" id="course" ng-model="eStudent.course" required>
                                                        
														<option value="">Select Any One</option>
														<option ng-repeat="x in AllCourse" value="{{x.c_id}}">{{x.course}}</option>
                                                     
                                                    </select><label for="course">Course</label> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-control form-select-sm" id="program" ng-model="eStudent.program" required>
                                                        <option value="">Select Any One</option>
														<option ng-repeat="x in AllProgram" value="{{x.program_name}}">{{x.program_name}}</option>
                                                       
                                                      </select> <label for="course">Program</label> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-control form-select-sm" ng-model="eStudent.batch" id="batch" required>
                                                        <option value="">Select Any One</option>
                                                        <option ng-repeat="x in AllBatch" value="{{x.b_id}}">{{x.batch_name}} | {{x.start_date}} | {{x.end_date}}</option>
                                                     
                                                      </select><label for="course">Batch</label> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-control form-select-sm" ng-model="eStudent.promo" id="promo" >
                                                        <option>Select Any One</option>
                                                        <option>GRE001</option>
                                                        <option>IELTS001</option>
                                                     
                                                      </select>
                                                      <label for="course">Promo code</label> 
                                                </div>
                                            </div>
                                        </div>
                                       <!-- <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="sdate" ng-model="eStudent.sdate" type="date" />  
                                                    <label for="date">Start Date</label>    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="edate" ng-model="eStudent.edate" type="date" />  
                                                    <label for="date">End Date</label>    
                                                </div>
                                            </div>
                                        </div>-->
                                     
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="file" ng-files="getTheFiles($files)">
                                                    <label class="input-group-text" for="inputGroupFile02">Upload Photo</label>
                                                  </div><span class="small text-danger" >Note: Image should be less than 25kb. Only JPG, PNG format allowed</span>
                                            </div>
                                          
                                        </div>
                                       
                                        <div class="mt-1 mb-0">
                                            <div class="d-grid"><button class="btn btn-primary btn-block" ng-click="addEnroll()">Add to Enroll</button></div>
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
                                       Enrollment List
                                    </div>
                                    <div class="card-body"><!--<canvas id="myBarChart" width="100%" height="40"></canvas>--><table class="table">
                                        <thead>
                                            <tr>  
												<th>Sno</th>
                                                <th>Enroll Id</th>
												<th>Name</th>
                                                <th>Student Mobile</th>
                                                <th>Batch</th>
                                                <th>Course</th>
                                               
                                            </tr>
                                        </thead>
										                                       
                                        <tbody>
                                            <tr ng-repeat="enr in AllEnroll">
                                                <td ng-bind="$index+1"></td>
												<td ng-bind="enr.eId"></td>
												<td ng-bind="enr.name"></td>
												<td ng-bind="enr.student_mobile"></td>
												<td ng-bind="enr.batch"></td>
												<td ng-bind="enr.course"></td>
												
                                            </tr>
                                            
                                       
                                        </tbody>
                                    </table></div>
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
		<!--angularjs---->
		<script src="dist/customjs/newStudents.js"></script>
    </body>
</html>
