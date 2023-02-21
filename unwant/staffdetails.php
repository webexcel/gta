<!DOCTYPE html>
<html lang="en">
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
        <style>
            * {
              box-sizing: border-box;
            }
            
            /* Create two equal columns that floats next to each other */
            .column {
              float: left;
              width: 50%;
              padding: 10px;
            }
            
            /* Clear floats after the columns */
            .row:after {
              content: "";
              display: table;
              clear: both;
            }
            /* Style the buttons */
            .btn {
              border: none;
              outline: none;
              padding: 12px 16px;
              background-color: #f1f1f1;
              cursor: pointer;
            }
            
            .btn:hover {
              background-color: #ddd;
            }
            
            .btn.active {
              background-color: #666;
              color: white;
            }
            </style>
    </head>
    <body class="sb-nav-fixed">
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
                                        <div id="btnContainer">
                                        <button class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
                                        <button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
                                      </div>
                                      <br>
                                      
                                      <div class="row mb-3">
                                        <div class="column" style="background-color:rgb(176, 230, 247);">
                                          <h3>Esha SHarm</h4>
                                          <p>Course : IELTS</p> <p>Batch : 6.00 - 7.00 am</p>
                                        </div>
                                        <div class="column" style="background-color:rgb(220, 194, 253);">
                                            <h3>Namachivayam</h4>
                                            <p>Course : IELTS</p> <p>Batch : 6.00 - 7.00 am</p>
                                          </div>
                                      </div>
                                      
                                      <div class="row mb-3">
                                        <div class="column" style="background-color:rgb(176, 230, 247);">
                                            <h3>Sathish Kumar</h4>
                                            <p>Course : IELTS</p> <p>Batch : 6.00 - 7.00 am</p>
                                          </div>
                                          <div class="column" style="background-color:rgb(220, 194, 253);">
                                              <h3>Mani Bharathi</h4>
                                              <p>Course : IELTS</p> <p>Batch : 6.00 - 7.00 am</p>
                                            </div>
                                        
                                      </div><table id="datatablesSimple1">
                                        <thead>
                                            <tr>
                                                <th>Mani</th>
                                                <th>Header1</th>
                                                <th>Header2</th>
                                                <th>Header3</th>
                                                <th>Header4</th>
                                                <th>Header2</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Faculty</th>
                                                <th>Course</th>
                                                <th>Enrolled</th>
                                                <th>Start date</th>
                                                <th>End Date</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Jayakumar</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>2011/06/25</td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Namachivayam</td>
                                                <td>System Architect</td>
                                                <td>120</td>
                                                <td>2011/04/25</td>
                                                <td>2011/06/25</td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Jayakumar</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>2011/06/25</td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Namachivayam</td>
                                                <td>System Architect</td>
                                                <td>35</td>
                                                <td>2011/04/25</td>
                                                <td>2011/06/25</td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Jayakumar</td>
                                                <td>System Architect</td>
                                                <td>75</td>
                                                <td>2011/04/25</td>
                                                <td>2011/06/25</td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Namachivayam</td>
                                                <td>System Architect</td>
                                                <td>85</td>
                                                <td>2011/04/25</td>
                                                <td>2011/06/25</td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Namasivayam</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>2011/06/25</td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Namachivayam</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>2011/06/25</td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Jayakumar</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>2011/06/25</td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Namachivayam</td>
                                                <td>System Architect</td>
                                                <td>25</td>
                                                <td>2011/04/25</td>
                                                <td>2011/06/25</td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Jayakumar</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>2011/06/25</td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Namachivayam</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>2011/06/25</td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Jayakumar</td>
                                                <td>System Architect</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>2011/06/25</td>
                                            </tr>
                                            <tr>
                                                <td>GRE</td>
                                                <td>Namachivayam</td>
                                                <td>System Architect</td>
                                                <td>45</td>
                                                <td>2011/04/25</td>
                                                <td>2011/06/25</td>
                                            </tr>
                                        </var>
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
                                    <div class="card-body"><!-- Place Holder for Add Student-->  <div class="d-flex ">
                                        <div class="image"> <img src="assets/img/staff.jpeg" class="rounded" width="155"> </div>
                                        <div class="m-3 w-100">
                                            <h4 class="mb-0 mt-0">Isha Sharma</h4> <span>Course: IELTS</span> </br><span>Batches: B001, B005</span>
                                            <div class="d-flex text-white">
                                                <div class="d-flex flex-column bg-primary p-1 m-1 rounded flex-fill text-center"> <span class="articles">D.O.J</span> <span class="number1">01-01-2020</span> </div>
                                                <div class="d-flex flex-column bg-danger p-1 m-1 rounded flex-fill text-center"> <span class="followers">Total Batches</span> <span class="number2">4</span> </div>
                                                <div class="d-flex flex-column bg-success p-1 m-1 rounded flex-fill text-center"> <span class="rating">Courses</span> <span class="number3">IELTS</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-bordered mt-3">
                                       
                                             <tbody> <tr>
                                                <td>Batch</td>
                                                <td>6.00 - 7.00 am</td> </tr>
                                                <tr>
                                                    <td>Course</td>
                                                    <td>IELTS</td> </tr>
                                                    <tr>
                                                        <td>D.O.B</td>
                                                        <td>01-01-2001</td> </tr>
                                                        <tr>
                                                            <td>Username</td>
                                                            <td>Username</td> </tr>
                                                            <tr>
                                                                <td>Password</td>
                                                                <td>Password@123</td> </tr>
                                                                <tr>
                                                                    <td>Batch</td>
                                                                    <td>6.00 - 7.00 am</td> </tr>
                                                                    <tr>
                                                                        <td>Course</td>
                                                                        <td>IELTS</td> </tr>
                                                                        <tr>
                                                                            <td>D.O.B</td>
                                                                            <td>01-01-2001</td> </tr>
                                                                            <tr>
                                                                                <td>Username</td>
                                                                                <td>Username</td> </tr>
                                                                                <tr>
                                                                                    <td>Password</td>
                                                                                    <td>Password@123</td> </tr>
                                            
                                            </tbody></table>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
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
                elements[i].style.width = "50%";
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
            </script>ß
    </body>
</html>
