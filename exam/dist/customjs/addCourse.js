var app = angular.module('appname', []);

app.controller('studentsCtrl',['$window','$location','$http', '$scope',  function ($window,$location,$http,$scope,) {

	$scope.saveCourse = function(aCourse) {
	console.log($scope.aCourse);			
		$http({
			method: "post",
			url: "ajax/insertData/insCourse.php",
			data: {
				aCourse: $scope.aCourse
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			$scope.response	= response;
			
			$window.location.href = "addCourse.php"; //You should have http here.
			//location.reload();
		}).error(function(response) {
			console.log(response);
		});		
	};
	
	$scope.getAllCourse = function() {
		$http.get('ajax/selectData/getAllCourse.php')
		.success(function(response){
			$scope.AllCourse=response
		}).error(function(err){
			console.log(err);
		});
	}
	$scope.getAllCourse();


	$scope.viewcourse = function() {
		$scope.c_id = $scope.c_id;
		console.log("test for view",$scope.c_id);		
			$http({
				method: "post",
				url: "ajax/selectData/getcoursebyId.php",
				data: {
					cid: $scope.c_id
				},
				headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
			}).success(function(response) {
				$scope.getCourseById	= response;
				console.log($scope.getCourseById);
			}).error(function(response) {
				console.log(response);
			});		
		};

		$scope.updateCourse = function(getCourseById) {			
			console.log("Edit Course",$scope.getCourseById);	
			$http({
				method: "post",
				url: "ajax/updateData/updateCourse.php",
				data: {
					editCourse: $scope.getCourseById
				},
				headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
			}).success(function(response) {
				$scope.response	= response;
				
				$window.location.href = "updatecourse.php"; //You should have http here.
			}).error(function(response) {
				console.log(response);
			});	
			
		};	

	
	$scope.getProgram = function() {
		$http.get('ajax/selectData/getProgram.php')
		.success(function(response){
			$scope.AllProgram = response
		}).error(function(err){
			console.log(err);
		});
	}
	$scope.getProgram();
	
	$scope.getCentre = function() {
		$http.get('ajax/selectData/getCentre.php')
		.success(function(response){
			$scope.AllCentre = response
		}).error(function(err){
			console.log(err);
		});
	}
	$scope.getCentre();

	$scope.deleteCourse = function(sid) {		
		console.log("Del Course",sid);
		
		$http({
			method: "post",
			url: "ajax/deleteData/delCourse.php",
			data: {
				delCourse: sid
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			$scope.response	= response;
			
			$window.location.href = "updatecourse.php"; //You should have http here.
		}).error(function(response) {
			console.log(response);
		});
		
	};
  
}]);