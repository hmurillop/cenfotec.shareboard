(function() {

    var app = angular.module('store', ['store-blogs']);
    
	this.store=null;
    app.controller("entryController", function($scope, $http) {
        this.entry = {};
			this.addentry = function() {
				
			$http.post('ln/blog_ln.php?accion=InsertarPublicacionBlog', { "data" : this.newEntry}).						
				success(function(data, status) {					
					
					this.store.blog=data;
				}).
				error(function(data, status) {
					$scope.data = data || "Request failed";
					$scope.status = status;			
				});
			}		
    });
	
    // app.controller("comentarioController", function() {
        // this.comment = {};

        // this.addcomentarios = function(entry) {
			// this.newComentario.enable=true;
		    // this.newComentario.usuario="jacqueline";
            // entry.comentarios.push(this.newComentario); //.push agregar un nuevo elemento a un arreglo 
            // this.newComentario = {}; //asigna a una nueva review los cambios del submit, asigna los cambios a la ultima asignacion  del puntero o variable
        // };
		
		// this.deleteComment = function(comment) {
			// comment.enable=false;
        // };
		
    // });  
	
	 app.controller("comentarioController", function() {
         this.comment = {};

         this.addcomentarios = function(entry) {
			 this.newComentario.enable=true;
		     this.newComentario.usuario="jacqueline";
             entry.comentarios.push(this.newComentario); //.push agregar un nuevo elemento a un arreglo 
             this.newComentario = {}; //asigna a una nueva review los cambios del submit, asigna los cambios a la ultima asignacion  del puntero o variable
			 
			 
         };
		
		// this.deleteComment = function(comment) {
			// comment.enable=false;
        // };
		
     }); 
	


	app.controller('StoreController', ['$http',
        function($http) {
            var store = this;

			$http.post('ln/blog_ln.php?accion=obtenerPublicacionPorUsuario', { "data" : ''}).
				success(function(data, status) {					
					store.blog=data;
				}).
				error(function(data, status) {
					$scope.data = data || "Request failed";
					$scope.status = status;			
				});
        }
	
		
    ]);
})(); 