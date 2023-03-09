var app = angular.module('appname', ['ui.bootstrap']);

app.filter('startFrom', function() {
	return function(input, start) {
		if(input) {
			start = +start; //parse to int
			return input.slice(start);
		}
		return [];
	}
});

app.filter('sumOfValue', function () {
	return function (data, key) {        
		if (angular.isUndefined(data) || angular.isUndefined(key))
			return 0;        
		var sum = 0;        
		angular.forEach(data,function(value){
			sum = sum + parseInt(value[key]);
		});        
		return sum;
	}
});


app.directive('ngFiles', ['$parse', function ($parse) {
	function fn_link(scope, element, attrs) {
		var onChange = $parse(attrs.ngFiles);
		element.on('change', function (event) {
			onChange(scope, { $files: event.target.files });
		});
	};

	return {
		link: fn_link
	}
	
}]);

app.controller('studentsCtrl',['$window','$location','$http', '$scope',  function ($window,$location,$http,$scope,) {
		$scope.pageSize = 10;
		$scope.maxSize = 10;
		$scope.start = 0;
		$scope.end = 0;
		$scope.currentPage = 0;
		$scope.numOfPages = 5;
		$scope.filteredItems = [];
		$scope.startItems = [];
		$scope.pagedItems = [];
		$scope.data = null;
	

	$scope.getAllQuestionpapper = function() {
		$http.get('ajax/selectData/getAllQuestionpapper.php')
		.success(function(response){
			console.log(response);
			$scope.data1 = response;
		}).error(function(err){
			console.log(err);
		});
	}
	$scope.getAllQuestionpapper();
	
	
	$scope.getAllQuestionpapperMapping = function() {
		$http.get('ajax/selectData/getAllQuestionpapperMapping.php')
		.success(function(response){
			console.log(response);
			$scope.qmapping = response;
		}).error(function(err){
			console.log(err);
		});
	}
	$scope.getAllQuestionpapperMapping();
	
	
	$scope.saveQuestionpapperMapping = function(qus) {		
		console.log($scope.qus)		
		$http({
			method: "post",
			url: "ajax/insertData/insertQuestionpappermapping.php",
			data: { qus : $scope.qus },
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			$scope.response	= response;
			$scope.getAllQuestionpapperMapping();
		}).error(function(response) {
			console.log(response);
		});		
	};

	
	$scope.setPage = function(pageNo) {
		$scope.currentPage = pageNo;
	};
	$scope.filter = function() {
		$timeout(function() { 
			$scope.filteredItems = $scope.filtered.length;
		}, 10);
	};
	$scope.sort_by = function(predicate) {
		$scope.predicate = predicate;
		$scope.reverse = !$scope.reverse;
	};
  
}]);