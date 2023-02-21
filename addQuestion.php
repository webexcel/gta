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
                        <h1 class="mt-4 mb-4">Add Question</h1>
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
                                                   <select class="form-control form-select-sm" id="stype" name="stype" ng-model="qus.stype" required>
                                                        <option value="">Choose</option>
                                                        <option value="MCQ">MCQ</option>
                                                        <option value="FIB">FIB</option>
                                                       </select><label for="type">Select Type</label> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
													<input type="text" id="imgid" name="imgid" class="form-control" ng-model="qus.imgid" placeholder="Search Image Path" >
													<a class="btn btn-primary btn-sm no-border" id="btn">Add Img</a>
						
                                                </div>
                                            </div>                                        
                                        </div>-->
										<!--<div class="row mb-3">
										<div class="col-md-12">
											<script type="text/ng-template" id="customTemplate.html">
												<a>
												  <span bind-html-unsafe= "match.label | typeaheadHighlight:query"></span>
												  <i>{{match.model.img_name }} | {{ match.model.img_path }} </i>
												</a>
											</script><div class="form-floating mb-3 mb-md-0">													
											<input type="text" id="imgid" name="imgid" class="form-control" data-validation="required" ng-model="qus.md" placeholder="Search Image Name" uib-typeahead="c as c.img_path for c in data1 | filter:$viewValue | limitTo:10" typeahead-min-length='1' typeahead-on-select='onSelectPart($item, $model, $label)' typeahead-template-url="customTemplate.html">
											<a class="btn btn-primary btn-sm no-border" id="btn">Add Img</a>
										</div>
										</div>
										</div>-->	
										<div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <textarea class="form-control" id="question" name="question" type="text" ng-model="qus.question" rows="5" cols="200" style="height:150px;" required></textarea>
                                                    <label for="bName">Enter Question</label>
                                                </div>
                                            </div>                                        
                                        </div>
										<div class="row mb-3">
										<div class="col-md-12">
											<script type="text/ng-template" id="customTemplate.html">
												<a>
												  <span bind-html-unsafe= "match.label | typeaheadHighlight:query"></span>
												  <i>{{match.model.img_name }} | {{ match.model.img_path }} </i>
												</a>
											</script><div class="form-floating mb-3 mb-md-0">													
											<input type="text" id="images" name="images" class="form-control" data-validation="required" ng-model="qus.images" placeholder="Search Image" uib-typeahead="c as c.img_path for c in data1 | filter:$viewValue | limitTo:10" typeahead-min-length='1' typeahead-on-select='onSelectPart($item, $model, $label)' typeahead-template-url="customTemplate.html"><label for="bName">Search Image</label>
										</div>
										</div>
										</div>
										<!--<div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
														<input class="form-control" id="images" name="images" type="text" ng-model="qus.images"/>
                                                    <label for="bName">Search Image</label>
                                                </div>
                                            </div>                                        
                                        </div>-->
										

										<div class="row mb-3">	
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                   <select class="form-control form-select-sm" id="type" name="type" ng-model="qus.type" required>
                                                        <option value="">Choose</option>
                                                       	<option value="Easy">Easy</option>
														<option value="Medium">Medium</option>
														<option value="Hard">Hard</option>
                                                       </select><label for="course">Select Level</label> 
                                                </div>
                                            </div>
                                        </div>

										<div class="row mb-3">	
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                   <select class="form-control form-select-sm" id="topic" name="topic" ng-model="qus.topic" required>
                                                        <option value="">Choose</option>
														
														<option value="2D Geometry">2D Geometry</option>
														<option value="3D Geometry">3D Geometry</option>
														<option value="Average">Average</option>
														<option value="Circle">Circle</option>
														<option value="Coordinate geometry">Coordinate geometry</option>
														<option value="Functions">Functions</option>
														<option value="Linear Equations and Inequations">Linear Equations and Inequations</option>
														<option value="Numbers and Number Properties">Numbers and Number Properties</option>
														<option value="Order of Operations">Order of Operations</option>
														<option value="Percentage">Percentage</option>
														<option value="Permutation and Combination,Counting">Permutation and Combination,Counting</option>
														<option value="Powers and roots">Powers and roots</option>
														<option value="Probability">Probability</option>
														<option value="Profit and Loss">Profit and Loss</option>
														<option value="Quadratic Equations">Quadratic Equations</option>
														<option value="Ratio and Proportion">Ratio and Proportion</option>
														<option value="Simple and Compound Interest Rates">Simple and Compound Interest Rates</option>
														<option value="Statistics">Statistics</option>
															<option value="Traingles">Traingles</option>
                                                       </select><label for="course">Select Topic</label> 
                                                </div>
                                            </div>
                                        </div>
										<form enctype="multipart/form-data" name="text1" method="post">  
										<div class="row mb-3">										
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">													
													<input type="text" name="txt" id="txt" class="form-control" ng-model="qus.txt" required/>
													<label for="Options">Options for comma value</label> 
												</div>
                                            </div>                                        
                                        </div>
										</form>										
										<!--<form enctype="multipart/form-data" name="text1" method="post">  
										<div class="row mb-3">
										<label for="explain">Options</label>
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">													
													<table width="100%" border="0" cellpadding="2" cellspacing="2" id="dataTable">
														<tr>
														  <td><input type="checkbox" name="chk[]" value="" /></td>							 
														  <td><input type="text" name="txt[]" id="txt[]" class="form-control" ng-model="qus.txt"/></td>
														</tr>
													</table>
													<input type="button" value="Add Row" onclick="addRow('dataTable')" />
													<input type="button" value="Delete Row" onclick="deleteRow('dataTable')" />
													<br />	  
												</div>
                                            </div>                                        
                                        </div>
										</form>-->
										<div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="Answer" name="Answer" type="text" ng-model="qus.Answer" placeholder="Enter Answer" required/>
                                                    <label for="Answer">Answer</label>
                                                </div>
                                            </div>                                        
                                        </div>
										
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="explain" name="explain" type="text" ng-model="qus.explain" placeholder="Enter Explanation" />
                                                    <label for="explain">Explanation</label>
                                                </div>
                                            </div>                                        
                                        </div>
										<div class="row mb-3">
										<div class="col-md-12">
											<script type="text/ng-template" id="customTemplate.html">
												<a>
												  <span bind-html-unsafe= "match.label | typeaheadHighlight:query"></span>
												  <i>{{match.model.img_name }} | {{ match.model.img_path }} </i>
												</a>
											</script><div class="form-floating mb-3 mb-md-0">													
											<input type="text" id="imgs" name="imgs" class="form-control" data-validation="required" ng-model="qus.imgs" placeholder="Search Image" uib-typeahead="c as c.img_path for c in data1 | filter:$viewValue | limitTo:10" typeahead-min-length='1' typeahead-on-select='onSelectPart($item, $model, $label)' typeahead-template-url="customTemplate.html"><label for="bName">Search Image</label>
										</div>
										</div>
										</div>
										<!--<div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
													<input class="form-control" id="imgs" name="imgs" type="text" ng-model="qus.imgs" placeholder="Search Image" />
													<label for="ExImage">Search Image</label>
                                                </div>
                                            </div>                                        
                                        </div>-->										
                                        
                                        <div class="mt-1 mb-0">
                                            <!--<div class="d-grid"><input type="submit" class="btn btn-primary btn-block" value="Add Question"  ng-disabled="payConfirmIsDisabled" /></div>-->
											<div class="d-grid"><a class="btn btn-primary btn-block"  ng-click="saveQuestion(qus)">Add Question</a></div>
                                        </div>
                                    </div>
								
                                </div>
                        
                               
                            </div>   
							<div class="col-xl-8">
							<div class="row">   
							
							<div class="row mb-12">
							<div class="col-md-2">
								<select class="form-control form-select-sm" id="stype" name="stype" ng-model="stype" required>
									<option value="">Choose Type</option>
									<option value="MCQ">MCQ</option>
									<option value="FIB">FIB</option>
								</select>
							</div>
							<div class="col-md-2">
								<select class="form-control form-select-sm" id="topic" name="topic" ng-model="topic" required>
										<option value="">Choose Topic</option>
										<option value="2D Geometry">2D Geometry</option>
										<option value="3D Geometry">3D Geometry</option>
										<option value="Average">Average</option>
										<option value="Circle">Circle</option>
										<option value="Coordinate geometry">Coordinate geometry</option>
										<option value="Functions">Functions</option>
										<option value="Linear Equations and Inequations">Linear Equations and Inequations</option>
										<option value="Numbers and Number Properties">Numbers and Number Properties</option>
										<option value="Order of Operations">Order of Operations</option>
										<option value="Percentage">Percentage</option>
										<option value="Permutation and Combination,Counting">Permutation and Combination,Counting</option>
										<option value="Powers and roots">Powers and roots</option>
										<option value="Probability">Probability</option>
										<option value="Profit and Loss">Profit and Loss</option>
										<option value="Quadratic Equations">Quadratic Equations</option>
										<option value="Ratio and Proportion">Ratio and Proportion</option>
										<option value="Simple and Compound Interest Rates">Simple and Compound Interest Rates</option>
										<option value="Statistics">Statistics</option>
										<option value="Traingles">Traingles</option>
							   </select>
							</div>
							<div class="col-md-2">
								<select class="form-control form-select-sm" id="level" name="level" ng-model="level" required>
									<option value="">Choose Level</option>
									<option value="Easy">Easy</option>
									<option value="Medium">Medium</option>
									<option value="Hard">Hard</option>
								</select>
							</div>
							<div class="col-md-2">
								<a class="btn btn-primary btn-block"  ng-click="getAllViewQuestion()">Submit</a>
							</div>
							<div class="col-md-2">
								
							</div>
							<div class="col-md-2">
							<input class="form-control" id="myInput" onkeyup="myFunction()" type="text" placeholder="Search Question" required/>
							</div>
							</div>
							
						</div>
						<div class="row"> 
						<br>
						</div>
                        <div class="row">   
							<div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <i class="fas fa-chart-bar me-1"></i>
                                      List of Question
                                    </div>
                                    <div class="card-body"><!--<canvas id="myBarChart" width="100%" height="40"></canvas>-->
                                    <table class="table table-striped table-bordered" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>Sno</th>
                                                <th>Question</th>
                                                <th>Option</th>
                                                <th>Level</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
											<tr ng-repeat="Qus in filtered = (ViewQuestion | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                                                <td ng-bind="$index+1"></td>
												<td ng-bind="Qus.question"></td>
												<td ng-bind="Qus.options"></td>
												<td ng-bind="Qus.level"></td>
                                            </tr>
											
                                            
                                        
                                        </tbody>
                                    </table>
										<div class="col-md-6 text-center">
											<ul uib-pagination boundary-links="true" boundary-link-numbers="true" ng-change="setPage(page)" max-size="maxSize" total-items="filtered.length" ng-model="page"  class="pagination-sm" previous-text="&lsaquo;" next-text="&rsaquo;" first-text="&laquo;" last-text="&raquo;"></ul>
										</div>
									
									</div>
									    
                                </div>
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
		<script src="dist/customjs/addQuestion.js"></script>
		
    </body>
</html>

<!-- inline scripts related to this page --> 
 <script type="text/javascript">
 
        jQuery("#btn").on('click', function() {
        var $txt = jQuery("#question");
        var caretPos = $txt[0].selectionStart;
        var textAreaTxt = $txt.val();
        //var txtToAdd = " (!image) ";
		//var txtToAdd1 =  $('#imgid').val();
		var txtToAdd = ' (!'+$('#imgid').val()+'!)';
        $txt.val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );
    });
</script>
<script language="javascript">

function addRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);
	var colCount = table.rows[0].cells.length;
	for(var i=0; i<colCount; i++) {
	var newcell = row.insertCell(i);
	newcell.innerHTML = table.rows[0].cells[i].innerHTML;
		//alert(newcell.childNodes);
		switch(newcell.childNodes[0].type) {
			case "text":
					newcell.childNodes[0].value = "";
					break;
			case "checkbox":
					newcell.childNodes[0].checked = false;
					break;
			case "select-one":
					newcell.childNodes[0].selectedIndex = 0;
					break;
		}
	}
}
 
function deleteRow(tableID) {
	try {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;

	for(var i=0; i<rowCount; i++) {
		var row = table.rows[i];
		var chkbox = row.cells[0].childNodes[0];
		if(null != chkbox && true == chkbox.checked) {
			if(rowCount <= 1) {
				alert("Cannot delete all the rows.");
				break;
			}
			table.deleteRow(i);
			rowCount--;
			i--;
		}

	}
	}catch(e) {
		alert(e);
	}
}


</SCRIPT>
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