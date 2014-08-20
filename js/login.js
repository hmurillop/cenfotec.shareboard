function formLogin($scope, $http){
$scope.url = './php/validacionLogin.php';
$scope.lin = './php/recuperacion.php';
var pagina = "blog_1.html";

$scope.loginPage = function(login){

 
  $http.post($scope.url, {"data": $scope.login}).
   success(function(data, status){
     var validacion = $scope.data = data;

      if(validacion === '1'){
       redireccionar();
      }
      else{
        alert('error');
      }
      
  
   });
  };
function redireccionar(){
  location.href= pagina;
};

$scope.recuperarPassword = function(){
   
   $http.post($scope.lin, {"data": $scope.password}).success(function(data, status){

         var recuperacion = $scope.data=data;
   })
};
}
