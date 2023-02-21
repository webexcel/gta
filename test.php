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
				<style>
p {
  text-align: center;
  font-size: 60px;
  margin-top: 0px;
}
</style>
    </head>
    <body class="sb-nav-fixed" ng-controller="studentsCtrl">
        <?php include('header.php'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include('sidebar.php'); ?>
            </div>
			
            <div id="layoutSidenav_content">
                <main>
				<br>
				<br>
				<p id="demo"></p>
				<div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-chart-bar me-1"></i>
                                      Student Name: S. Jayakumar | GRE Test
                                    </div>
                                    <div class="card-body">
									<!--<table id="datatablesSimple1">-->
									<table class="table table-striped table-bordered" >
                                        <tr>
    <th>Question</th><td>Which is the topp bschool in france?</td>
	
    
  </tr>
    <tr>
    <th>Image</th><td><img src="uploads/eq2s.jpg"  width="" height=""></td>
	
    
  </tr>
  <tr>
    <th>Option A</th><td><input type="radio" value="Audencia">Audencia</td>
	
    
  </tr>
    <tr>
    <th>Option B</th><td><input type="radio" value="ISEG">ISEG</td>
	
  </tr>
   <tr>
    <th>Option c</th><td><input type="radio" value="EMnOrm"> EMnOrm</td>
	
  </tr>
     <tr>
    <th>Option D</th><td><input type="radio" value="Skema"> Skema</td>
	
  </tr>
                                    </table>
									<a href="test1.php" class="btn btn-primary">Next</a>
										<div class="col-md-6 text-center">
											<ul uib-pagination boundary-links="true" boundary-link-numbers="true" ng-change="setPage(page)" max-size="maxSize" total-items="filtered.length" ng-model="page"  class="pagination-sm" previous-text="&lsaquo;" next-text="&rsaquo;" first-text="&laquo;" last-text="&raquo;"></ul>
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

// Set the date we're counting down to
var countDownDate = new Date("july 11, 2022 20:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
