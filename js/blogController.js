(function() {

    var app = angular.module('store', ['store-blogs']);
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
*/
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
		
    });

	
	// levanta los datos del php
	app.controller('StoreController', ['$http',
        function($http) {
            var store = this;

            //store.blog = [];
			
            /*$http.get('blogs.json').success(function(data) { // el get hay que asignarle la ruta del documento de JSon para que aceda
                store.blog = data;
            });*/
			
			// parametro lleva la url q voy a consultar
			$http.post('ln/blog_ln.php?accion=obtenerPublicacionPorUsuario', { "data" : ''}).
				success(function(data, status) {
					/*$scope.status = status;
					$scope.data = data;
					$scope.result = data; // Show result from server in our <pre></pre> element*/
					//alert(angular.toJson(data));
					//store.blog=angular.toJson(data);
					store.blog=data;
				}).
				error(function(data, status) {
					$scope.data = data || "Request failed";
					$scope.status = status;			
				});
        }
	
		
    ]);
})(); 