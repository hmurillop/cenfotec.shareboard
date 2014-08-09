(function(){

	var app = angular.module('login', []);
    var pagina='blog.html';

    app.controller('LoginController', ['$scope', '$http', function($scope, $http){
       $http.get('').success(function(data){

       	$scope.users = data;

       });

       $scope.loginPage= function(login){
       	for(var i = 0; i< $scope.users.length; i++){

       		if($scope.users[i].email == login.email && $scope.users[i].password == login.password){
       			redireccionar();
       		}
       	}
       }

       function redireccionar(){
       	location.href = pagina;
       }
    }])
})();