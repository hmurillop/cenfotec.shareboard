function formLogin($scope, $http){
$scope.url = './php/validacionLogin.php';
var pagina = "blog_1.html";

$scope.loginPage = function(login){

 
  $http.post($scope.url, {"data": $scope.login}).
   success(function(data, status){
     var validacion = $scope.data = data;
      
      if(validacion){
       redireccionar();
      }
      else{
        alert('error');
      }
      
  
   });
  };
function redireccionar(){
  location.href= pagina;
}

}