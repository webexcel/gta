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
                        <h1 class="mt-4 mb-4">View Students Details</h1>
							<div class="row">
								<div class="col-md-3">
									<input class="form-control" id="myInput" onkeyup="myFunction()" type="text" placeholder="Search Name" required/>
								</div>
							</div>
							<br>
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card mb-4 text-white">
                                    <div class="card-header bg-primary text-white bg-primary">
                                        <i class="fas fa-user me-1"></i>
                                       Student List
                                    </div>
                                    <div class="card-body"><!--<canvas id="myBarChart" width="100%" height="40"></canvas>-->
									<table class="table table-striped table-bordered" id="myTable">
                                        <thead>
                                            <tr>  
												<th>Sno</th>
                                                <th>Name</th>
                                                <th>Student_mobile</th>
                                                <th>email</th>
                                                <th>Course</th>
                                                <th>Centre</th>
												<th>View</th>
                                            </tr>
                                        </thead>
										                                       
                                        <tbody>
											<tr ng-repeat="enr in filtered = (AllEnroll | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                                                <td ng-bind="$index+1"></td>
												<td ng-bind="enr.name"></td>
												<td ng-bind="enr.student_mobile"></td>
												<td ng-bind="enr.email"></td>
												<td ng-bind="enr.program"></td>
												<td ng-bind="enr.batch"></td>
												<td><button class="btn btn-primary btn-block" ng-click="viewStudent(enr.StId)">View</button></td>
                                            </tr>
                                            
                                       
                                        </tbody>
                                    </table>
										<div class="col-md-6 text-center">
											<ul uib-pagination boundary-links="true" boundary-link-numbers="true" ng-change="setPage(page)" max-size="maxSize" total-items='50'
									</div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-user-tie me-1"></i>
                                     Student Details
                                    </div>
                                    <div class="card-body"><!-- Place Holder for Add Student-->  <div class="d-flex ">
                                        <div class="image"> <img src="assets/img/student.jpeg" class="rounded" width="155"> </div>
                                        <div class="m-3 w-100">
                                            <p>Student Name : {{getStudentById.name}}</p> 
											<p>Student Id : {{getStudentById.StId}}</p>
                                            <div class="d-flex text-white">
                                                <!--<div class="d-flex flex-column bg-primary p-1 m-1 rounded flex-fill text-center"> <span class="articles">Total Hours</span> <span class="number1">38</span> </div>
                                                <div class="d-flex flex-column bg-danger p-1 m-1 rounded flex-fill text-center"> <span class="followers">Completed Exams</span> <span class="number2">980</span> </div>
                                                <!--<div class="d-flex flex-column bg-success p-1 m-1 rounded flex-fill text-center"> <span class="rating">Days Remaining</span> <span class="number3">8.9</span> </div>-->
                                            </div>
                                        </div>
                                    </div>
										<table class="table table-bordered mt-3">                                     
                                            <tbody> 
												<tr>
													<td>Name</td>
													<td>{{getStudentById.name}}</td> 
												</tr>
												<tr>
													<td>Contact</td>
													<td>{{getStudentById.student_mobile}}</td> 
												</tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{getStudentById.email}}</td> 
												</tr>
												<tr>
													<td>Centre</td>
													<td>{{getStudentById.center}}</td> 
												</tr>
												<tr>
                                                <tr>
													<td>Course</td>
													<td>{{getStudentById.course}}</td> 
												</tr>
												<tr>
													<td>Program</td>
													<td>{{getStudentById.program_name}}</td> 
												</tr>
												<tr>
													<td>Batch</td>
													<td>{{getStudentById.batch_name}}</td> 
												</tr>
												<tr>
													<td>Start Date</td>
													<td>{{getStudentById.start_date}}</td>
												</tr>
												<tr>
													<td>End Date</td>
													<td>{{getStudentById.end_date}}</td> 
												</tr>
												<tr>
													<td>Duration</td>
													<td>{{getStudentById.timing}}</td> 
												</tr>
												<tr>
													<td>Parent Name</td>
													<td>{{getStudentById.parent_name}}</td> 
												</tr>
                                                <tr>
                                                    <td>Parent mobile</td>
                                                    <td>{{getStudentById.parent_mobile}}</td> 
												</tr>
												<tr>
													<td>Prefered Country</td>
													<td>{{getStudentById.prefered_country}}</td> 
												</tr>												
                                                <tr>
													<td>Period</td>
													<td>{{getStudentById.days}}</td> 
												</tr>
												<tr>
													<td>D.O.B</td>
													<td>{{getStudentById.dob}}</td> 
												</tr>
												<tr>
													<td>Gender</td>
													<td>{{getStudentById.gender}}</td> 
												</tr>
												<tr>
													<td>Institution</td>
													<td>{{getStudentById.institution}}</td> 
												</tr>
												<tr>
													<td>Qualification</td>
													<td>{{getStudentById.qualification}}</td> 
												</tr>
												<tr>
													<td>Source</td>
													<td>{{getStudentById.source}}</td> 
												</tr>
												<tr>
													<td>Remarks</td>
													<td>{{getStudentById.remarks}}</td> 
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script src="dist/js/angular.min.js"></script>
		<script src="dist/js/ui-bootstrap-tpls-0.14.3.js"></script>	
		<!--angularjs---->
		<script src="dist/customjs/getStudents.js"></script>
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
    td = tr[i].getElementsByTagName("td")[1];
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