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
                        <h1 class="mt-4 mb-4">Student Data</h1>
                        <div class="row">
						 <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-chart-bar me-1"></i>
                                       Student List
                                    </div>
                                    <div class="card-body">
									<!--<table id="datatablesSimple1">-->
									<table class="table">
                                        <thead>
                                            <tr>
												<th>Sno</th>
                                                <th>Enquiry Id</th>
												 <th>Name</th>                                           
                                                <th>Mobile</th>
                                                <th>Course</th>
                                                <th>Centre</th>
												<th>Edit</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <tr ng-repeat="Enquiry in AllEnquiry">
                                                <td ng-bind="$index+1"></td>
												<td ng-bind="Enquiry.StId"></td>
												<td ng-bind="Enquiry.name"></td>
												
												<td ng-bind="Enquiry.student_mobile"></td>
												<td ng-bind="Enquiry.course"></td>
												<td ng-bind="Enquiry.center"></td>
												<td><button class="btn btn-primary btn-block" ng-click="viewStudent(Enquiry.StId)">Edit</button></td>
                                            </tr>
                                            
                                       
                                        </tbody>
                                    </table>
									</div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-chart-area me-1"></i>
                                      Update Student
                                    </div>
                                    <div class="card-body"><!-- Place Holder for Add Student-->  
									<form id="myForm" name="myForm" method="post" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="name" ng-model="getStudentById.name" type="text" ng-value="getStudentById.name" required/>  <label for="name">Your name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="parent_name" ng-model="getStudentById.parent_name" type="text" ng-value="getStudentById.parent_name" required/>
                                                    
                                                </div>
                                            </div>
                                        </div>
										 <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="institution" ng-model="getStudentById.institution" type="text" ng-value="getStudentById.institution" required/>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="qualification" ng-model="getStudentById.qualification" type="text" ng-value="getStudentById.qualification" required/>
                                                   
                                                </div>
                                            </div>
                                        </div>
										
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="student_mobile" ng-model="getStudentById.student_mobile" type="text" minlength="10" maxlength="10" 
                                                    ng-value="getStudentById.student_mobile" required/>
                                                  
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="parent_mobile" ng-model="getStudentById.parent_mobile" type="text" maxlength="10" 
                                                    ng-value="getStudentById.parent_mobile" required/>
                                                
                                                </div>
                                            </div>
                                        </div>
										
									
										<div class="row mb-3">
											<div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="Email" ng-model="getStudentById.email" name="email" type="text" 
                                                     ng-pattern="/^[a-z]+[a-z0-9._]+@[a-z]+\.[a-z.]{2,5}$/" ng-value="getStudentById.email" required/>
                                                    <span class="error" ng-show="myForm.input.$error.pattern">Not valid email!</span>
                                                </div>
                                            </div>
                                        
                                            
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="address" ng-model="getStudentById.address" type="text"  ng-value="getStudentById.address" style="height: 100px" required/>
 
                                                <!--<textarea class="form-control" id="address"  ng-model="aStudent.address" style="height: 100px" required>{{getStudentById.address}}
                                                </textarea>-->
													
                                                </div>
                                            </div>
                                        </div>
										
										

                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
												<button class="btn btn-primary btn-block" ng-click="updateEnquiry(getStudentById.StId)">Update Student</button>
											</div>
                                        </div>
                                    </form>
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
		<!--angularjs---->
		<script src="dist/customjs/newStudents.js"></script>
		<!--<script src="dist/js/angular-1.4.8.min.js"></script>-->
	
</body>
</html>
