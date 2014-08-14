(function(){
    var app = angular.module('login', []);
    var pagina = 'blog_1.html';
 

    app.controller('LoginController', ['$scope', '$http', function($scope, $http){
           $scope.url = './php/validacionLogin.php';     	

       $http.post($scope.url,{"data": $scope.login}).success(function(data,status){

       	$scope.users = data;

       });

       $scope.loginPage= function(login){
       	for(var i = 0; i < $scope.users.length; i++){

       		if($scope.users == login.email){
            alert('entre');
       			redireccionar();
       		};
       	};
       };

       function redireccionar(){
       	location.href = pagina;
       };
    }])


})();