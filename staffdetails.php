<!DOCTYPE html>
<html lang="en"  ng-app="appname">
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
        <style>
            * {
              box-sizing: border-box;
            }
            
            /* Create two equal columns that floats next to each other */
            .column {
              float: left;
              width: 48%;
              padding: 10px;
              margin:1px;
            }

            .odd {
  color: Blue;
  background-color: #f1f1f1;
}
.even {
  color: blue;
}
            
            /* Clear floats after the columns */
            .row:after {
              content: "";
              display: table;
              clear: both;
            }
            /* Style the buttons */
            .btnn {
              border: none;
              outline: none;
              padding: 12px 16px;
              background-color: #f1f1f1;
              cursor: pointer;
            }
            
            .btnn:hover {
              background-color: #ddd;
            }
            
            .btnn.active {
              background-color: #666;
              color: white;
            }
            </style>
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
                        <h1 class="mt-4 mb-4">Staff Details</h1>
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-user me-1"></i>
                                       Staff List
                                    </div>
                                    <div class="card-body"><!--<canvas id="myBarChart" width="100%" height="40"></canvas>-->
                                     
                                      <table class="table">
                                        <thead>
                                            <tr>  
												<th>Sno</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>email</th>
                                                <th>Type</th>
                                                <th>Centre</th>
												<th>View</th>
                                            </tr>
                                        </thead>
										                                       
                                        <tbody>
                                            <tr ng-repeat="enr in allEmployee">
                                                <td ng-bind="$index+1"></td>
												<td ng-bind="enr.staff_name"></td>
												<td ng-bind="enr.contact"></td>
												<td ng-bind="enr.email"></td>
												<td ng-bind="enr.job_type"></td>
												<td ng-bind="enr.centre"></td>
												<td><button class="btn btn-primary btn-block" ng-click="viewStaff(enr.sid)">View</button></td>
                                            </tr>
                                            
                                       
                                        </tbody>
                                    </table></div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-user-tie me-1"></i>
                                     Staff Details
                                    </div>
                                    <div class="card-body"><!-- Place Holder for Add Student--> 
                                     <div class="d-flex ">
                                        <div class="image"> <img src="assets/img/staff.jpeg" class="rounded" width="155"> </div>
                                        <div class="m-3 w-100">
                                            <h4 class="mb-0 mt-0">Name: {{getStaffById.staff_name}}</h4> 
                                            <div class="d-flex text-white">
                                                <div class="d-flex flex-column bg-primary p-1 m-1 rounded flex-fill text-center"> <span class="articles">D.O.J</span> <span class="number1">{{getStaffById.doj}}</span> </div>
                                                <div class="d-flex flex-column bg-danger p-1 m-1 rounded flex-fill text-center"> <span class="followers">Centre</span> <span class="number2">{{getStaffById.centre}}</span> </div>
                                                <div class="d-flex flex-column bg-success p-1 m-1 rounded flex-fill text-center"> <span class="rating">Repoting to </span> <span class="number3">{{getStaffById.reportingto}}</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-bordered mt-3">                                     
                                            <tbody> 
												<tr>
													<td>Contact</td>
													<td>{{getStaffById.contact}}</td> 
												</tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{getStaffById.email}}</td> 
												</tr>
												<tr>
													<td>Centre</td>
													<td>{{getStaffById.centre}}</td> 
												</tr>
												
												
												<tr>
													<td>Parent Name</td>
													<td>{{getStaffById.Sur_name}}</td> 
												</tr>
                                               
												<tr>
													<td>D.O.B</td>
													<td>{{getStaffById.dob}}</td> 
												</tr>
                                                <tr>
													<td>D.O.J</td>
													<td>{{getStaffById.doj}}</td> 
												</tr>
												<tr>
													<td>Gender</td>
													<td>{{getStaffById.gender}}</td> 
												</tr>
												<tr>
													<td>Qualification</td>
													<td>{{getStaffById.qualification}}</td> 
												</tr>
                                                <tr>
													<td>Reporting To</td>
													<td>{{getStaffById.reportingto}}</td> 
												</tr>
												<tr>
													<td>Address</td>
													<td>{{getStaffById.address}}</td> 
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
                            <div class="text-muted">Copyright &copy; Galaxytraining.in 2021</div>
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
  
        <script>
            // Get the elements with class="column"
            var elements = document.getElementsByClassName("column");
            
            // Declare a loop variable
            var i;
            
            // List View
            function listView() {
              for (i = 0; i < elements.length; i++) {
                elements[i].style.width = "100%";
              }
            }
            
            // Grid View
            function gridView() {
              for (i = 0; i < elements.length; i++) {
                elements[i].style.width = "48%";
              }
            }
            
            /* Optional: Add active class to the current button (highlight it) */
            var container = document.getElementById("btnContainer");
            var btns = container.getElementsByClassName("btn");
            for (var i = 0; i < btns.length; i++) {
              btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
              });
            }
            </script>
             <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
		<!--angularjs---->
		<script src="dist/customjs/addEmployee.js"></script>
    </body>
</html>
