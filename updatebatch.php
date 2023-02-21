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
    <body class="sb-nav-fixed" ng-controller="studentsCtrl">
        <?php include('header.php'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include('sidebar.php'); ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 mb-4">Update Batch</h1>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-chart-area me-1"></i>
                                      Update Batch Details
                                    </div>
                                    <div class="card-body"><!-- Place Holder for Add Student-->  <form>
                                        <div class="row mb-3">
                                        <div class="col-md-6">
													<select class="form-control form-select-sm" id="b_id" ng-model="b_id" ng-change="getBatchbyId()">
													<option value="">Select Any One</option>
													<option ng-repeat="aBatch in AllBatch" value="{{aBatch.b_id}}">{{aBatch.batch_name}}</option>
                                                    </select>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="bName" type="text" ng-model="getBatchById.batch_name" placeholder="Enter Batch name" />
                                                    <label for="bName">Enter Batch Name</label>
                                                </div>
                                            </div>

                                          
                                          
                                        </div>
										 <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating"> <select class="form-control form-select-sm" id="hours" ng-model="getBatchById.timing" required>
                                                        <option value="">Select Any One</option>
                                                        <option value="100 Hours">100 Hours</option>
                                                        <option value="150 Hours">150 Hours</option>
                                                        <option value="200 Hours">200 Hours</option>                                                 
                                                    </select><label for="feeamount">Hours</label> 
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-control form-select-sm" id="program_name"  ng-model="getBatchById.program_id" required>
                                                        <option value="">Select Any One</option>
														<option ng-repeat="x in AllProgram" value="{{x.pid}}">{{x.program_name}}</option>
                                                       
                                                      </select> <label for="program_name">Program</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                <select class="form-control form-select-sm" id="centre" ng-model="getBatchById.center_id" required>
                                                        <option value="">Select Any One</option>
														<option ng-repeat="x in AllCentre" value="{{x.cid}}">{{x.center}}</option>
                                                     
                                                      </select><label for="Centre">Select Centre</label> 
                                                </div>
                                            </div>
											
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-control form-select-sm" id="faculty" ng-value="getBatchById.emp_id" ng-model="getBatchById.emp_id" required>
                                                        <option value="">Select Any One</option>
														<option ng-repeat="x in AllEmployee" value="{{x.sid}}">{{x.staff_name}}</option>
                                                     
                                                      </select><label for="course">Select Faculty</label> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="date" type="date" ng-model="getBatchById.start_date" ng-value="getBatchById.start_date"/>  
                                                    <label for="date">Start Date</label>    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="date" type="date" ng-model="getBatchById.end_date" ng-value="getBatchById.end_date"/>  
                                                    <label for="date">End Date</label>    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <!--<div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="timing" type="text" ng-model="getBatchById.timing" placeholder="Enter your first name" />
                                                    <label for="inputFirstName">Enter Timings</label>
                                                </div>
                                            </div>-->
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-control form-select-sm" id="type" ng-model="getBatchById.days" >
                                                        <option value="">Choose</option>
                                                        <option value="Weekdays">Weekdays</option>
                                                        <option value="Week Ends">Week Ends</option>
                                                       </select><label for="course">Select Type</label> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select class="form-control form-select-sm" id="course" >
                                                        <option>Choose</option>
                                                        <option>Weekdays</option>
                                                        <option>Week Ends</option>
                                                    </select><label for="course">Select Type</label> 
                                                </div>
                                            </div>                                                                                
                                        </div>-->
                                        <div class="mt-1 mb-0">
                                            <div class="d-grid"><a class="btn btn-primary btn-block"  ng-click="updateBatch()">Save Batch</a></div>
                                        </div>
                                    
                                    </form>
                                    </div>
                                </div>
                        
                               
                            </div>    <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-chart-bar me-1"></i>
                                      List of Batches
                                    </div>
                                    <div class="card-body"><!--<canvas id="myBarChart" width="100%" height="40"></canvas>-->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sno</th>
                                                <th>Batch Name</th>
                                                <th>Program</th>
                                                <th>Center</th>
                                                <th>Timing</th>
                                                <th>Start date</th>
                                                <th>End date</th>
												<th>Del</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <tr ng-repeat="Batch in AllBatch">
                                                <td ng-bind="$index+1"></td>
												<td ng-bind="Batch.batch_name"></td>
												<td ng-bind="Batch.program_name"></td>
												<td ng-bind="Batch.center"></td>
												<td ng-bind="Batch.timing"></td>
												<td ng-bind="Batch.start_date"></td>
                                                <td ng-bind="Batch.end_date"></td>
												<td><button type="button" ng-click="deleteBatch(Batch.b_id)">Del</button></td>
                                            </tr>
                                            
                                        </var>
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
		<script src="dist/customjs/addBatch.js"></script>
    </body>
</html>
