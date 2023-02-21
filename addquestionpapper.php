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
        <link rel="stylesheet" href="dist/css/bootstrap.min.css" />	
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
                        <h1 class="mt-4 mb-4">Add Question Papper</h1>
						<div class="row">   
							
							<div class="row mb-12">
							<div class="col-md-2">								
							</div>
							<div class="col-md-2">								
							</div>
							<div class="col-md-2">								
							</div>
							<div class="col-md-2">
							</div>
							<div class="col-md-2">
							</div>
							<div class="col-md-2">
							<input class="form-control" id="myInput" onkeyup="myFunction()" type="text" placeholder="Search name" required/>
							</div>
							</div>
							
						</div>
						<div class="row"> 
						<br>
						</div>
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-chart-area me-1"></i>
                                      Add Question Details
                                    </div> 
									<div class="card-body"><!-- Place Holder for Add Student-->  <form>
										
										<div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="qusname" name="qusname" ng-model="qus.qusname"type="text" />
                                                    <label for="qusname">Question Name</label>
                                                </div>
                                            </div>                                        
                                        </div>
										<div class="row mb-3">
											<div class="col-md-12">
												<script type="text/ng-template" id="customTemplate.html">
													<a>
													  <span bind-html-unsafe= "match.label | typeaheadHighlight:query"></span>
													  <i>{{match.model.sid }} | {{ match.model.staff_name }} </i>
													</a>
												</script>
												<div class="form-floating mb-3 mb-md-0">													
													<input type="text" id="Faculty" name="Faculty" class="form-control" data-validation="required" ng-model="qus.faculty" placeholder="Search Faculty" uib-typeahead="c as c.sid for c in data | filter:$viewValue | limitTo:10" typeahead-min-length='1' typeahead-on-select='onSelectPart($item, $model, $label)' typeahead-template-url="customTemplate.html"><label for="bName">Search Faculty</label>
												</div>
											</div>
										</div>
                                        <div class="mt-1 mb-0">
                                            <div class="d-grid">
											<input type="submit" class="btn btn-primary btn-block" value="Save" ng-click="saveQuestionpapper(qus)"/></div>
                                        </div>
                                    </div>
								
                                </div>
                        
                               
                            </div>    
							<div class="col-xl-8">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-chart-bar me-1"></i>
                                      List of Question Papper Name
                                    </div>
                                    <div class="card-body"><!--<canvas id="myBarChart" width="100%" height="40"></canvas>-->
                                    <table class="table" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>Sno</th>
                                                <th>Papper Name</th>
                                                <th>Staff ID</th>
												<th>Staff Name</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <tr ng-repeat="papper in data1">
                                                <td ng-bind="$index+1"></td>
												<td ng-bind="papper.quspapper_name"></td>
												<td ng-bind="papper.sid"></td>
												<td ng-bind="papper.staff_name"></td>
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
		<script src="dist/customjs/addQuestionpapper.js"></script>
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
