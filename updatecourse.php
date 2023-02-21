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
                        <h1 class="mt-4 mb-4">Update Course</h1>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-chart-area me-1"></i>
                                      Update Course Details
                                    </div>
                                    <div class="card-body"><!-- Place Holder for Add Student-->  <form>
                                    <div class="row mb-3">
                                            <div class="col-md-6">
													<select class="form-control form-select-sm" id="c_id" ng-model="c_id" ng-change="viewcourse()">
													<option value="">Select Any One</option>
													<option ng-repeat="ac in AllCourse" value="{{ac.c_id}}">{{ac.course}}</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-2">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="courseName" type="text" placeholder="Enter your first name" ng-model="getCourseById.course" required/>
                                                    <label for="courseName">Course</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-floating">
                                                <select class="form-control form-select-sm" id="program" ng-model="getCourseById.program" required>
                                                        <option value="">Select Any One</option>
														<option ng-repeat="x in AllProgram" value="{{x.program_name}}">{{x.program_name}}</option>
                                                       
                                                      </select> <label for="program">Program</label>  
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-control form-select-sm" id="Duration" ng-model="getCourseById.duration">
                                                      
														<option value="{{getCourseById.duration}}">{{getCourseById.duration}}</option>
                                                        <option value="100 Hours">100 Hours</option>
                                                        <option value="150 Hours">150 Hours</option>
                                                        <option value="200 Hours">200 Hours</option>                                                 
                                                    </select><label for="Duration">Duration</label> 
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-floating">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="feeamount" type="text" ng-model="getCourseById.amount"  required/>
                                                        <label for="feeamount">Fee amount</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-floating mb-3 mb-md-0">
                                                <select class="form-control form-select-sm" id="centre" ng-model="getCourseById.center" required>
                                                        <option value="">Select Any One</option>
														<option ng-repeat="x in AllCentre" value="{{x.center}}">{{x.center}}</option>
                                                     
                                                      </select>
                                                      <label for="Course">Centre</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <div class="mt-2 mb-0">
                                                        <div class="d-grid"><a class="btn btn-primary btn-block" href="#" ng-click="updateCourse()">Save Course</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         
                                    </form>
                                    </div>
                                </div>
                        
                               
                            </div>    <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header bg-success text-white">
                                        <i class="fas fa-chart-bar me-1"></i>
                                      List of Courses
                                    </div>
                                    <div class="card-body"><!--<canvas id="myBarChart" width="100%" height="40"></canvas>-->
                                    <table class="table">
                                        <thead>
                                            <tr>
												<th>Sno</th>
                                                <th>Course</th>
                                                <th>Program</th>                                          
                                                <th>Timing</th>
                                                <th>Amount</th>
                                                <th>Centre</th>
												<th>Delete</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <tr ng-repeat="Course in AllCourse">
                                                <td ng-bind="$index+1"></td>
												<td ng-bind="Course.course"></td>
												<td ng-bind="Course.program"></td>
												<td ng-bind="Course.duration"></td>
												<td ng-bind="Course.amount"></td>
												<td ng-bind="Course.center"></td>
												<td>
												
												<a class="btn btn-danger btn-block" href="#" ng-click="deleteCourse(Course.c_id)">Del</a>										</td>
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
		<script src="dist/customjs/addCourse.js"></script>
    </body>
</html>
