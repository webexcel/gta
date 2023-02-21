var app = angular.module('appname', []);

app.controller('studentsCtrl',['$window','$location','$http', '$scope',  function ($window,$location,$http,$scope,) {



	$scope.getAllcount = function() {
		$http.get('ajax/selectData/getAllcount.php')
		.success(function(response){
			$scope.Allcount=response
			console.log("chk",$scope.Allcount);
		}).error(function(err){
			console.log(err);
		});
	}
	$scope.getAllcount();
	
	
  
}]);