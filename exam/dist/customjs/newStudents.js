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

app.controller('studentsCtrl',['$window','$location','$http', '$scope',  function ($window,$location,$http,$scope) {

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
		
	function studentsCtrl($scope) {
		$scope.email = $scope.email;
		console.log($scope.email);	
		$scope.emailFormat = /^[a-z]+[a-z0-9._]+@[a-z]+\.[a-z.]{2,5}$/;
		
	}
	
	$scope.saveEnquiry = function(aStudent) {
	console.log($scope.aStudent);
	if ($scope.myForm.$valid) {			
		$http({
			method: "post",
			url: "ajax/insertData/insEnquiry.php",
			data: {
				aStudent: $scope.aStudent
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		}).success(function(response) {
			$scope.response	= response;
			$scope.aStudent.email = "";
			$window.location.href = "addStudent.php"; //You should have http here.
		}).error(function(response) {
			console.log(response);
		});	
	} else {
		alert("Some Fields are missing");
		return false;	
	}	
	};
	
	$scope.getAllEnquiry = function() {
		$http.get('ajax/selectData/getAllEnquiry.php')
		.success(function(response){
			$scope.AllEnquiry = response
			$scope.currentPage = 1; //current page
			$scope.entryLimit = 5; //max no of items to display in a page
			$scope.filteredItems = $scope.AllEnquiry.length; //Initially for no filter  
			$scope.totalItems = $scope.AllEnquiry.length;	
		}).error(function(err){
			console.log(err);
		});
	}
	$scope.getAllEnquiry();

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

	/*var formdata = new FormData();getEnquirybyId
	$scope.getTheFiles = function ($files) {
		angular.forEach($files, function (value, key) {
			formdata.append(key, value);
		});
	};*/
	
    $scope.addEnroll = function(getStudentById) {
        console.log("enroll",$scope.getStudentById1);
		
			 /*  var file = $scope.formdata;
               console.log('file is ',file );
               console.dir(file);
               var uploadUrl = "/uploads";
               fileUpload.uploadFileToUrl(file, uploadUrl);*/

            $http({
                method: "post",
                url: "ajax/insertData/insEnroll.php",
                data: {
                    eStudent: $scope.getStudentById1
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).success(function(response) {
                $scope.response	= response;
                
              // $window.location.href = "studentEnrollment.php"; //You should have http here.
                //location.reload();
            }).error(function(response) {
                console.log(response);
            });		
        };


		$scope.viewStudent1 = function() {
			$scope.sid = $scope.stid;		
                $http({
                    method: "post",
                    url: "ajax/selectData/getStudentById1.php",
                    data: {
                        eStudent: $scope.sid
                    },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).success(function(response) {
                    $scope.getStudentById1	= response;
                   // console.log("qqqq", $scope.getStudentById.name);
                   // $window.location.href = "studentEnrollment.php"; //You should have http here.
                    //location.reload();
                }).error(function(response) {
                    console.log(response);
                });		
            };
		
		$scope.viewStudent = function() {
			$scope.sid = $scope.stid;
        	console.log("test for view",$scope.sid);		
                $http({
                    method: "post",
                    url: "ajax/selectData/getStudentById.php",
                    data: {
                        eStudent: $scope.sid
                    },
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                }).success(function(response) {
                    $scope.getStudentById	= response;
                   // console.log("qqqq", $scope.getStudentById.name);
                   // $window.location.href = "studentEnrollment.php"; //You should have http here.
                    //location.reload();
                }).error(function(response) {
                    console.log(response);
                });		
            };

		$scope.viewStudentEdit = function() {
		$scope.sid = $scope.stid;
		console.log("test for view",$scope.sid);		
			$http({
				method: "post",
				url: "ajax/selectData/getStudentByIdEdit.php",
				data: {
					eStudent: $scope.sid
				},
				headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
			}).success(function(response) {
				$scope.getStudentByEdit	= response;
			}).error(function(response) {
				console.log(response);
			});		
		};

		$scope.UpdateEnroll = function(getStudentByEdit) {
			console.log("edit el",$scope.getStudentByEdit);
	
				$http({
					method: "post",
					url: "ajax/updateData/updateEnrollment.php",
					data: {
						getStudentByEdit: $scope.getStudentByEdit
					},
					headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
				}).success(function(response) {
					$scope.response	= response;
					console.log("edit enroll",$scope.response);
					$window.location.href = "updateStudentEnroll.php"; //You should have http here.
					//location.reload();
				}).error(function(response) {
					console.log(response);
				});		
			};
			

			


			$scope.updateEnquiry = function(sid) {		
				console.log("kkk",sid);		
				console.log("ddd",$scope.getStudentById);	
					$http({
						method: "post",
						url: "ajax/updateData/updatestudent.php",
						data: {
							editUser: $scope.getStudentById , uid : sid
						},
						headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
					}).success(function(response) {
						$scope.response	= response;
						
						$window.location.href = "updateDetails.php"; //You should have http here.
					}).error(function(response) {
						console.log(response);
					});	
				
			};
			
			$scope.deleteEnroll = function(enrollId) {		
				console.log("kkk",enrollId);
				
				$http({
					method: "post",
					url: "ajax/deleteData/delEnroll.php",
					data: {
						delEnroll: enrollId
					},
					headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
				}).success(function(response) {
					$scope.response	= response;
					
					$window.location.href = "updateStudentEnroll.php"; //You should have http here.
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