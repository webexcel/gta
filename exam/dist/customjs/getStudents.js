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
	
	
    $scope.getAllEnroll = function() {
		$http.get('ajax/selectData/getAllEnroll.php')
		.success(function(response){
			$scope.AllEnroll = response
			$scope.currentPage = 1; //current page
			$scope.entryLimit = 5; //max no of items to display in a page
			$scope.filteredItems = $scope.AllEnroll.length; //Initially for no filter  
			$scope.totalItems = $scope.AllEnroll.length;
		}).error(function(err){
			console.log(err);
		});
	}
	$scope.getAllEnroll();

    $scope.getAllBatch = function() {
		$http.get('ajax/selectData/getAllBatch.php')
		.success(function(response){
			$scope.AllBatch=response
		}).error(function(err){
			console.log(err);
		});
	}
	$scope.getAllBatch();

    $scope.getProgram = function() {
		$http.get('ajax/selectData/getProgram.php')
		.success(function(response){
			$scope.AllProgram = response
		}).error(function(err){
			console.log(err);
		});
	}
	$scope.getProgram();

    
	$scope.getAllCourse = function() {
		$http.get('ajax/selectData/getAllCourse.php')
		.success(function(response){
			$scope.AllCourse=response
		}).error(function(err){
			console.log(err);
		});
	}
	$scope.getAllCourse();

	
	$scope.getCentre = function() {
		$http.get('ajax/selectData/getCentre.php')
		.success(function(response){
			$scope.AllCentre = response
		}).error(function(err){
			console.log(err);
		});
	}
	$scope.getCentre();

    $scope.addEnroll = function(eStudent) {
        console.log($scope.eStudent);			
            $http({
                method: "post",
                url: "ajax/insertData/insEnroll.php",
                data: {
                    eStudent: $scope.eStudent
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).success(function(response) {
                $scope.response	= response;
                
                $window.location.href = "studentEnrollment.php"; //You should have http here.
                //location.reload();
            }).error(function(response) {
                console.log(response);
            });		
        };

        $scope.viewStudent = function(StId) {
            console.log("dsfgd");			
			$http({
				method: "post",
				url: "ajax/selectData/getStudentById.php",
				data: {
					eStudent: StId
				},
				headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
			}).success(function(response) {
				$scope.getStudentById	= response;
				console.log("asfd", $scope.getStudentById.name);
			   // $window.location.href = "studentEnrollment.php"; //You should have http here.
				//location.reload();
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