var app = angular.module('appname', []);

app.controller('studentsCtrl',['$window','$location','$http', '$scope',  function ($window,$location,$http,$scope,) {

	$scope.saveBatch = function(aBatch) {
	console.log($scope.aBatch);			
		$http({
			method: "post",
			url: "ajax/insertData/insBatch.php",
			data: {
				aBatch: $scope.aBatch
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			$scope.response	= response;
			
			$window.location.href = "addBatches.php"; //You should have http here.
			//location.reload();
		}).error(function(response) {
			console.log(response);
		});		
	};

	$scope.getBatchbyId = function() {
		$scope.b_id = $scope.b_id;
		console.log("test for view",$scope.b_id);		
			$http({
				method: "post",
				url: "ajax/selectData/getAllBatchbyId.php",
				data: {
					bid: $scope.b_id
				},
				headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
			}).success(function(response) {
				$scope.getBatchById	= response;
				console.log($scope.getBatchById);
			}).error(function(response) {
				console.log(response);
			});		
		};

	$scope.getAllBatch = function() {
		$http.get('ajax/selectData/getAllBatch.php')
		.success(function(response){
			$scope.AllBatch=response
		}).error(function(err){
			console.log(err);
		});
	}
	$scope.getAllBatch();
	
	$scope.getEmployee = function() {
		$http.get('ajax/selectData/getEmployee.php')
		.success(function(response){
			$scope.AllEmployee = response
		}).error(function(err){
			console.log(err);
		});
	}
	$scope.getEmployee();
	
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

	$scope.updateBatch = function(getBatchById) {			
		console.log("Edit Batch",$scope.getBatchById);	
		$http({
			method: "post",
			url: "ajax/updateData/updateBatch.php",
			data: {
				editBatch: $scope.getBatchById
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			$scope.response	= response;
			
			$window.location.href = "updatebatch.php"; //You should have http here.
		}).error(function(response) {
			console.log(response);
		});	
		
	};

	$scope.deleteBatch = function(sid) {		
		console.log("Del batch",sid);
		
		$http({
			method: "post",
			url: "ajax/deleteData/delBatch.php",
			data: {
				delBatch: sid
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			$scope.response	= response;
			
			$window.location.href = "updatebatch.php"; //You should have http here.
		}).error(function(response) {
			console.log(response);
		});
		
	};
  
}]);