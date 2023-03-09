var app = angular.module('appname', []);

app.controller('studentsCtrl',['$window','$location','$http', '$scope',  function ($window,$location,$http,$scope,) {

	$scope.saveEmployee = function(aEmployee) {
	console.log($scope.aEmployee);	
if ($scope.myForm.$valid) {		
		$http({
			method: "post",
			url: "ajax/insertData/insEmployee.php",
			data: {
				aEmployee: $scope.aEmployee
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			$scope.response	= response;
			
			$window.location.href = "addEmployee.php"; //You should have http here.
			//location.reload();
		}).error(function(response) {
			console.log(response);
		});		
		} else {
		alert("Some Fields are missing");
		return false;	
	}
	};
	
	$scope.getAllEmployee = function() {
		$http.get('ajax/selectData/getAllEmployee.php')
		.success(function(response){
			$scope.allEmployee = response
		}).error(function(err){
			console.log(err);
		});
	}
	$scope.getAllEmployee();

	
	$scope.getCentre = function() {
		$http.get('ajax/selectData/getCentre.php')
		.success(function(response){
			$scope.AllCentre = response
		}).error(function(err){
			console.log(err);
		});
	}
	$scope.getCentre();

	$scope.viewStaff = function(sid) {	
		console.log(sid);	
		$http({
			method: "post",
			url: "ajax/selectData/getStaffById.php",
			data: {
				aEmployee: sid
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			$scope.getStaffById	= response;
		}).error(function(response) {
			console.log(response);
		});		
	};

	$scope.viewStaffedit = function() {	
		$scope.sid = $scope.sid;
		console.log($scope.sid);	
		$http({
			method: "post",
			url: "ajax/selectData/getStaffById.php",
			data: {
				aEmployee: $scope.sid
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			$scope.getStudentByEdit	= response;
		}).error(function(response) {
			console.log(response);
		});		
	};

	$scope.updateEmployee = function(getStudentByEdit) {			
		console.log("Edit Emp",$scope.getStudentByEdit);	
		$http({
			method: "post",
			url: "ajax/updateData/updateEmployee.php",
			data: {
				editEmp: $scope.getStudentByEdit
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			$scope.response	= response;
			
			$window.location.href = "updateStaff.php"; //You should have http here.
		}).error(function(response) {
			console.log(response);
		});	
		
	};

	$scope.deleteStaff = function(sid) {		
		console.log("Del Staff",sid);
		
		$http({
			method: "post",
			url: "ajax/deleteData/delStaff.php",
			data: {
				delStaff: sid
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			$scope.response	= response;
			
			$window.location.href = "updateStaff.php"; //You should have http here.
		}).error(function(response) {
			console.log(response);
		});
		
	};
  
}]);