(function() {

    var app = angular.module('foro', ['ui.bootstrap']);


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

    app.controller('generalForoCtrl', ['$scope', '$http', function ($scope, $http) {
        $scope.tab = 1;
        $scope.flag= false;
        $scope.users=[];
        $scope.master={};

        $scope.tabSelected = function  (navTab) {
            return $scope.tab == navTab;
        };
        $scope.selectTab = function  (selectedTab) {
            $scope.tab = selectedTab;
        };

        $scope.showFormAddPost = function(){
            $scope.flag= true;
        };

        $scope.addUser = function(selected){

        $scope.master= angular.copy(selected);
        $scope.users.push($scope.master);
        console.log($scope.users);
        $scope.master = {};

            

        };

    }]);



	app.controller('StoreController', ['$http', '$scope', function($http,$scope) {
            
            var store = this;

			$http.post('ln/makeForo_ln.php?accion=obtenerListaCarrera', { "data" : ''}).
				success(function(data, status) {
					store.foroCarreras=data;
				}).
				error(function(data, status) {
					$scope.data = data || "Request failed";
					$scope.status = status;			
				});

            $http.post('ln/makeForo_ln.php?accion=obtenerListaCursos', { "data" : ''}).
                success(function(data, status) {
                    store.foroCursos=data;
                }).
                error(function(data, status) {
                    $scope.data = data || "Request failed";
                    $scope.status = status;         
                });


            $http.post('ln/makeForo_ln.php?accion=obtenerListaProfesores', { "data" : ''}).
                success(function(data, status) {
                    store.foroProfesores=data;
                }).
                error(function(data, status) {
                    $scope.data = data || "Request failed";
                    $scope.status = status;         
                });


                $http.post('ln/makeForo_ln.php?accion=obtenerListaUsuarios', { "data" : ''}).
                success(function(data, status) {
                    store.foroUsuarios=data;
                }).
                error(function(data, status) {
                    $scope.data = data || "Request failed";
                    $scope.status = status;         
                });

        }
	
		
    ]);
})(); 