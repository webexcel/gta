var app = angular.module('appname', []);

app.controller('examCtrl',['$window','$location','$http', '$scope',  function ($window,$location,$http,$scope,) {



	$scope.getAllcount = function() {
		$http.get('../ajax/selectData/studentQuestions.php')
		.success(function(response){
			$scope.result=response
			$scope.questionlength=response.length
			// console.log($scope.questionlength);
		}).error(function(err){
			console.log(err);
		});
	}
	$scope.getAllcount();
	
	
  
}]);