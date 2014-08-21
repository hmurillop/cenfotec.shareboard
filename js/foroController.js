(function() {

    var app = angular.module('foro', []);
    // angular.module('blog', ['store-blogs', 'modalTest','main']);

   /* app.controller('StoreController', ['$http',
        function($http) {
            var store = this;

            store.blog = [];
			
            $http.get('blogs.json').success(function(data) { // el get hay que asignarle la ruta del documento de JSon para que aceda
                store.blog = data;
            });
        }	
    ]);

    app.controller("entryController", function() {
        this.entry = {};

        this.addentry = function(blog) {
		this.newEntry.enable=true;
            blog.entries.unshift(this.newEntry); //.push agregar un nuevo elemento a un arreglo unshift me lo agrega arriba
            this.newEntry = {}; //asigna a una nueva review los cambios del submit, asigna los cambios a la ultima asignacion  del puntero o variable
        };
		
		this.deleteEntry = function(entry) {
             entry.enable=false;
        };
    });
	
    app.controller("comentarioController", function() {
        this.comment = {};

        this.addcomentarios = function(entry) {
			this.newComentario.enable=true;
		    this.newComentario.usuario="jacqueline";
            entry.comentarios.push(this.newComentario); //.push agregar un nuevo elemento a un arreglo 
            this.newComentario = {}; //asigna a una nueva review los cambios del submit, asigna los cambios a la ultima asignacion  del puntero o variable
        };
		
		this.deleteComment = function(comment) {
			comment.enable=false;
        };
		
    });*/

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



	app.controller('StoreController', ['$http', function($http) {
            
            var store = this;

            //store.blog = [];
			
            /*$http.get('blogs.json').success(function(data) { // el get hay que asignarle la ruta del documento de JSon para que aceda
                store.blog = data;
            });*/

			$http.post('ln/makeForo_ln.php?accion=obtenerListaCarrera', { "data" : ''}).
				success(function(data, status) {
					/*$scope.status = status;
					$scope.data = data;
					$scope.result = data; // Show result from server in our <pre></pre> element*/
					//alert(angular.toJson(data));
					//store.blog=angular.toJson(data);
					store.foroCarreras=data;
				}).
				error(function(data, status) {
					$scope.data = data || "Request failed";
					$scope.status = status;			
				});

            $http.post('ln/makeForo_ln.php?accion=obtenerListaCursos', { "data" : ''}).
                success(function(data, status) {
                    /*$scope.status = status;
                    $scope.data = data;
                    $scope.result = data; // Show result from server in our <pre></pre> element*/
                    //alert(angular.toJson(data));
                    //store.blog=angular.toJson(data);
                    store.foroCursos=data;
                }).
                error(function(data, status) {
                    $scope.data = data || "Request failed";
                    $scope.status = status;         
                });


            $http.post('ln/makeForo_ln.php?accion=obtenerListaProfesores', { "data" : ''}).
                success(function(data, status) {
                    /*$scope.status = status;
                    $scope.data = data;
                    $scope.result = data; // Show result from server in our <pre></pre> element*/
                    //alert(angular.toJson(data));
                    //store.blog=angular.toJson(data);
                    store.foroProfesores=data;
                }).
                error(function(data, status) {
                    $scope.data = data || "Request failed";
                    $scope.status = status;         
                });


                $http.post('ln/makeForo_ln.php?accion=obtenerListaUsuarios', { "data" : ''}).
                success(function(data, status) {
                    /*$scope.status = status;
                    $scope.data = data;
                    $scope.result = data; // Show result from server in our <pre></pre> element*/
                    //alert(angular.toJson(data));
                    //store.blog=angular.toJson(data);
                    store.foroUsuarios=data;
                }).
                error(function(data, status) {
                    $scope.data = data || "Request failed";
                    $scope.status = status;         
                });

        }
	
		
    ]);
})(); 