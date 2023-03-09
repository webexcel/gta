var app = angular.module('appname',['ui.bootstrap']);

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
	

		$scope.getAllImglib = function() {
			$http.get('ajax/selectData/getAllImglib.php')
			.success(function(response){
				console.log(response);
				$scope.data1 = response;
			}).error(function(err){
				console.log(err);
			});
		}
		$scope.getAllImglib();

	$scope.getAllViewQuestion = function() {			
		$http({
			method: "post",
			url: "ajax/selectData/getAllViewQuestion.php",
			data: {
				stype : $scope.stype,topic : $scope.topic, level : $scope.level
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			$scope.ViewQuestion	= response;
			$scope.currentPage = 1; //current page
			$scope.entryLimit = 10; //max no of items to display in a page
			$scope.filteredItems = $scope.ViewQuestion.length; //Initially for no filter  
			$scope.totalItems = $scope.ViewQuestion.length;	
		}).error(function(response) {
			console.log(response);
		});		
	};
	$scope.getAllViewQuestion();
	
	
	$scope.deleteQus = function(qus) {
		$scope.dStudent = {				
			Qid : qus.id,			
		};
	}
	
	$scope.deleteQuestion = function() {
		console.log($scope.dStudent);							
		$http({
			method: "post",
			url: "ajax/deleteData/deleteQuestion.php",
			data: {
				uStudent: $scope.dStudent
				},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {		
			$scope.getAllViewQuestion();
		}).error(function(response) {
			console.log(response);
		});	
	};


	$scope.ViewQusq = function(qus) {
		console.log(qus);
		
		$scope.id = qus;
		$http({
			method: "post",
			url: "ajax/selectData/getQuestionDetails.php",
			data: {
				qid: $scope.id
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			$scope.ViewQus = response;
			
		}).error(function(response) {
			console.log(response);
		});
	/*	$scope.ViewQus = {				
			Vid : qus.id,
			Vquestion : qus.question,
			Vque_image : qus.que_image,
			Voptions : qus.options,
			Vanswer : qus.answer,
			Vexplanation : qus.explanation,
			Vexp_img : qus.ans_image,			
		};*/
		
		
	};


	
	$scope.editQus = function(qus) {
		$scope.EditQus = {				
			Eid : qus.id,
			Estype : qus.type,
			Equestion : qus.question,
			Eque_image : qus.que_image,
			Elevel : qus.level,
			Etopic : qus.topic,
			Eoptions : qus.options,
			Eanswer : qus.answer,
			Eexplanation : qus.explanation,	
			Eans_image : qus.ans_image,		
		};
		//$("#editStudentModal").modal('show');
	}


	$scope.UpdateQuestion = function(EditQus) {
		console.log($scope.EditQus);
		$http({
			method: "post",
			url: "ajax/updateData/UpdateQuestion.php",
			data: {
				uStudent: $scope.EditQus
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			$scope.getAllViewQuestion();
		}).error(function(response) {
			console.log(response);
		});
	}


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