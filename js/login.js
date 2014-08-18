function formLogin($scope, $http){
$scope.url = './php/validacionLogin.php';


$scope.loginPage = function(login){

 
  $http.post($scope.url, {"data": $scope.login}).
   success(function(data, status){
     alert($scope.data = data);

  
   });
  };
}