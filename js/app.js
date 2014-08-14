(function(){

	var app = angular.module('sharedboard', []);


    app.controller('foroMakerCtrl', ['$scope', function($scope) {
    	$scope.master = {};
    	$scope.update = function(foro) {
    	$scope.master = $scope.template;
    	$scope.master[0].name = foro;
    	console.log($scope.master[0]);
    	$scope.foros.push($scope.master[0]);
    	$scope.flag3 = true;
    	$scope.master = {};
    	console.log($scope.foros);
    };

	         

    }]);

    app.controller('generalForoCtrl', ['$scope', function($scope) {

    	$scope.flag= false;
    	$scope.flag1= false;

    	$scope.showFormAddPost = function(){
    		$scope.flag= true;
    	}

    	$scope.showFormAddForo = function(){
    		$scope.flag1= true;
    	}

   
	         

    }]);



    

    



})();