<?php
	require_once('login/auth.php');
	require_once('login/configi.php');
	error_reporting(0);
	
	$dt	=	date("d-m-Y");
?>

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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <!--<li class="breadcrumb-item active">Dashboard</li>-->
                        </ol>
                        <div class="row">
                            <div class="col-xl-2 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body bg-secondary text-white">No.of.Enquiry</div>
                                    <div class="m-2">
                                        <div class="d-flex text-white">
                                        <div class="small d-flex flex-column bg-primary  m-1 flex-fill rounded  text-center"> <span class="articles">Total</span> <span class="number1">{{Allcount.enquiry}}</span> </div>
                                        <!--<div class="small d-flex flex-column bg-danger  m-1 rounded flex-fill text-center"> <span class="followers">On Roll</span> <span class="number2"></span> </div>
                                        <div class="small d-flex flex-column bg-success m-1 flex-fill rounded text-center"> <span class="rating">Follow up</span> <span class="number3"></span> </div>-->
                                    </div>
                                    </div>
                                </div>
                            </div>
							<div class="col-xl-2 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body bg-success text-white" >No.of.Enrolled</div>
                                    <div class="m-2">
                                        <div class="d-flex text-white">
                                        <div class="small d-flex flex-column bg-primary  m-1 flex-fill rounded  text-center"> <span class="articles">Total </span> <span class="number1">{{Allcount.enroll}}</span> </div>
                                        <!--<div class="small d-flex flex-column bg-danger  m-1 rounded flex-fill text-center"> <span class="followers">Regular</span> <span class="number2"></span> </div>
                                        <div class="small d-flex flex-column bg-success m-1 flex-fill rounded text-center"> <span class="rating">Part Time</span> <span class="number3"></span> </div>-->
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body bg-warning">No.of.Employees </div>
                                    <div class="m-2">
                                        <div class="d-flex text-white">
                                        <div class="small d-flex flex-column bg-primary  m-1 flex-fill rounded  text-center"> <span class="articles">Total </span> <span class="number1">{{Allcount.staff}}</span> </div>
                                        <!--<div class="small d-flex flex-column bg-danger  m-1 rounded flex-fill text-center"> <span class="followers">Faculty</span> <span class="number2"></span> </div>
                                        <div class="small d-flex flex-column bg-success m-1 flex-fill rounded text-center"> <span class="rating">Counsellors</span> <span class="number3"></span> </div>-->
                                    </div>
                                </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-2 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body bg-danger text-white">No.of.Courses</div>
                                    <div class="m-2">
                                        <div class="d-flex text-white">
                                        <div class="small d-flex flex-column bg-primary  m-1 flex-fill rounded  text-center"> <span class="articles">Total </span> <span class="number1">{{Allcount.course}}</span> </div>
                                        <!--<div class="small d-flex flex-column bg-danger  m-1 rounded flex-fill text-center"> <span class="followers">Programs</span> <span class="number2"></span> </div>
                                        <div class="small d-flex flex-column bg-success m-1 flex-fill rounded text-center"> <span class="rating">Pthers</span> <span class="number3"></span> </div>-->
                                    </div>
                                </div>
                                </div>
                            </div>
							<div class="col-xl-2 col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body bg-dark text-white">No.of.Batches</div>
                                    <div class="m-2">
                                        <div class="d-flex text-white">
                                        <div class="small d-flex flex-column bg-primary  m-1 flex-fill rounded  text-center"> <span class="articles">Total</span> <span class="number1">{{Allcount.batch}}</span> </div>
                                        <!--<div class="small d-flex flex-column bg-danger  m-1 rounded flex-fill text-center"> <span class="followers">On Roll</span> <span class="number2"></span> </div>
                                        <div class="small d-flex flex-column bg-success m-1 flex-fill rounded text-center"> <span class="rating">Follow up</span> <span class="number3"></span> </div>-->
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <!-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-search me-1"></i>
                                       List of Batches
                                    </div>
                                    <div class="card-body">
                                        <table class="table-striped" id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th>Batch Id</th>
                                                    <th>Faculty</th>
                                                    <th>Course</th>
                                                    <th>Enrolled</th>
                                                    <th>Start date</th>
                                                    <th>End Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                       
                                            <tbody>
                                                <tr>
                                                    <td>6.00-7.00am</td>
                                                    <td>Jayakumar</td>
                                                    <td>GRE</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>2011/08/25</td>
                                                    <td> <a class="btn btn-warning btn-sm" href="#"><i class="fas fa-search me-1"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>7.00-8.00am</td>
                                                    <td>Namachivayam</td>
                                                    <td>System Architect</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                     <td>2011/08/25</td>
                                                     <td> <a class="btn disabled btn-secondary btn-sm" href="#"><i class="fas fa-search me-1"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>GRE</td>
                                                    <td>Jayakumar</td>
                                                    <td>System Architect</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                     <td>2011/08/25</td>
                                                     <td> <a class="btn disabled btn-secondary btn-sm" href="#"><i class="fas fa-search me-1"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>GRE</td>
                                                    <td>Namachivayam</td>
                                                    <td>System Architect</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                     <td>2011/08/25</td>
                                                     <td> <a class="btn" href="#"><i class="fas fa-search me-1"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>GRE</td>
                                                    <td>Jayakumar</td>
                                                    <td>System Architect</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                     <td>2011/08/25</td>
                                                      <td> <a class="btn btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-search me-1"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>GRE</td>
                                                    <td>Namachivayam</td>
                                                    <td>System Architect</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                     <td>2011/08/25</td>
                                                      <td> <a class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-search me-1"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>GRE</td>
                                                    <td>Jayakumar</td>
                                                    <td>System Architect</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                     <td>2011/08/25</td>
                                                      <td> <a class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-search me-1"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>GRE</td>
                                                    <td>Namachivayam</td>
                                                    <td>System Architect</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>2011/08/25</td>
                                                     <td> <a class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-search me-1"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>GRE</td>
                                                    <td>Jayakumar</td>
                                                    <td>System Architect</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                     <td>2011/08/25</td>
                                                      <td> <a class="btn btn-outline-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-search me-1"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>GRE</td>
                                                    <td>Namachivayam</td>
                                                    <td>System Architect</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                     <td>2011/08/25</td>
                                                      <td> <a class="btn btn-outline-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-search me-1"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>GRE</td>
                                                    <td>Jayakumar</td>
                                                    <td>System Architect</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                     <td>2011/08/25</td>
                                                      <td> <a class="btn btn-outline-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-search me-1"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>GRE</td>
                                                    <td>Namachivayam</td>
                                                    <td>System Architect</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                     <td>2011/08/25</td>
                                                      <td> <a class="btn btn-outline-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-search me-1"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>GRE</td>
                                                    <td>Jayakumar</td>
                                                    <td>System Architect</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                     <td>2011/08/25</td>
                                                      <td> <a class="btn btn-outline-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-search me-1"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>GRE</td>
                                                    <td>Namachwwwivayam</td>
                                                    <td>System Architect</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                     <td>2011/08/25</td>
                                                     <td> <a class="btn btn-outline-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-search me-1"></i></a></td>
                                                </tr>
                                            </var>
                                            </tbody>
                                        </table></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Recent Courses
                                    </div>
                                    <div class="card-body">
									<table class="table-striped" id="datatablesSimple1">
                                        <thead>
                                            <tr>
                                                <th>Batch Id</th>
                                                <th>Faculty</th>
                                                <th>Course</th>
                                                <th>Enrolled</th>
                                                <th>Start date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                            <tr>
                                                <td>6.00-7.00am</td>
                                                <td>Jayakumar</td>
                                                <td>GRE</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>2011/08/25</td>
                                                <td> <a class="btn btn-warning btn-sm"  href="#">Text</a></td>
                                            </tr>
                                           
                                            <tr>
                                                <td>GRE</td>
                                                <td>Namachivayam</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                 <td>2011/08/25</td>
                                                 <td> <a class="btn btn-sm" href="#"><i class="fas fa-search me-1"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Jayakumar</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                 <td>2011/08/25</td>
                                                  <td> <a class="btn btn-outline-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal1"><i class="fas fa-search me-1"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Namachivayam</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                 <td>2011/08/25</td>
                                                  <td> <a class="btn btn-outline-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal1"><i class="fas fa-search me-1"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Jayakumar</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                 <td>2011/08/25</td>
                                                  <td> <a class="btn btn-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal1"><i class="fas fa-search me-1"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Namachivayam</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>2011/08/25</td>
                                                 <td> <a class="btn btn-info btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal1"><i class="fas fa-search me-1"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>7.00-8.00am</td>
                                                <td>Namachivayam</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                 <td>2011/08/25</td>
                                                 <td> <a class="btn disabled btn-secondary" ><i class="fas fa-search me-1"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Jayakumar</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                 <td>2011/08/25</td>
                                                 <td> <a class="btn disabled btn-secondary " ><i class="fas fa-search me-1"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Jayakumar</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                 <td>2011/08/25</td>
                                                  <td> <a class="btn btn-outline-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal1"><i class="fas fa-search me-1"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Namachivayam</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                 <td>2011/08/25</td>
                                                  <td> <a class="btn btn-outline-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal1"><i class="fas fa-search me-1"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Jayakumar</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                 <td>2011/08/25</td>
                                                  <td> <a class="btn btn-outline-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal1"><i class="fas fa-search me-1"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Namachivayam</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                 <td>2011/08/25</td>
                                                  <td> <a class="btn btn-outline-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal1"><i class="fas fa-search me-1"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Jayakumar</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                 <td>2011/08/25</td>
                                                  <td> <a class="btn btn-outline-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal1"><i class="fas fa-search me-1"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Namachwwwivayam</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                 <td>2011/08/25</td>
                                                 <td> <a class="btn btn-outline-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#myModal1"><i class="fas fa-search me-1"></i></a></td>
                                            </tr>
                                        </var>
                                        </tbody>
                                    </table></div>
                                </div>
                            </div>
                        </div>-->
                   

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

        <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModal">View Batch</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card mb-1">
                <div class="card-body bg-secondary text-white">Batch 001</div>
                <div class="m-1">
                    <div class="d-flex">
                        <table class="table table-bordered">
                            
                       
                            <tbody>
                                <tr>
                                    <td>Batch Code</td>
                                    <td>B001</td>
                                </tr>
                                <tr>
                                    <td>Course</td>
                                    <td>IELTS</td>
                                </tr>
                                <tr>
                                    <td>Incharge</td>
                                    <td>Jayakumar</td>
                                </tr>
                                <tr>
                                    <td>No of Students</td>
                                    <td>30</td>
                                </tr>
                                
                                <tr>
                                    <td>Start Date</td>
                                    <td>01-01-2022</td>
                                </tr>
                                <tr>
                                    <td>End Date</td>
                                    <td>31-03-2022</td>
                                </tr>
                                <tr>
                                    
                                    <td>Timings</td>
                                    <td>7.00-8.00am</td>
                                </tr></tbody></table>
                </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <!--<button type="button" class="btn btn-danger">Save changes</button>-->
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal1" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModal">View Course</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card mb-1">
                <div class="card-body bg-secondary text-white">Course - IELTS</div>
                <div class="m-1">
                    <div class="d-flex">
                        <table class="table table-bordered">
                            
                       
                            <tbody>
                                <tr>
                                    <td>Course Code</td>
                                    <td>IELTS</td>
                                </tr>
                                <tr>
                                    <td>Incharge</td>
                                    <td>Jayakumar</td>
                                </tr>
                                <tr>
                                    <td>No of Students</td>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <td>Other Heads</td>
                                    <td>Some Text</td>
                                </tr>
                            </tbody></table>
                </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <!--<button type="button" class="btn btn-danger">Save changes</button>-->
        </div>
      </div>
    </div>
  </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
		<script src="dist/customjs/dashboard.js"></script>
		
    </body>
</html>
