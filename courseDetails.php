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
    <body  ng-controller="studentsCtrl" class="sb-nav-fixed">
        <?php include('header.php'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include('sidebar.php'); ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 mb-4">View Course Details</h1>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-chart-bar me-1"></i>
                                      List of Course
                                    </div>
                                    <div class="card-body"><!--<canvas id="myBarChart" width="100%" height="40"></canvas>--><table class="table">
                                        <thead>
                                            <tr>  
												<th>Sno</th>
                                                <th>Course</th>
                                                <th>Duration</th>
                                                <th>Program</th>
                                                <th>Amount</th>
                                                
												<th>Centre</th>
                                            </tr>
                                        </thead>
										                                       
                                        <tbody>
                                            <tr ng-repeat="b in AllCourse">
                                                <td ng-bind="$index+1"></td>
												<td ng-bind="b.course"></td>
												<td ng-bind="b.duration"></td>
												<td ng-bind="b.program"></td>
												<td ng-bind="b.amount"></td>												
												<td ng-bind="b.center"></td>
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
		<script src="dist/customjs/addCourse.js"></script>
    </body>
</html>
