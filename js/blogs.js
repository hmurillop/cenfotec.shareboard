  (function() {
      var app = angular.module('store-blogs', []);

      app.directive('blogTitle', function() {
          return {
              restrict: 'A', //'A' es asignado si <h3 product-title> es asignado como atributo y no como directiva
              templateUrl: 'title.html' //llamado del documento html aparte en cual contiene el h3
          }; //a se asigna a un atributo y e es para un elemento de tags
      });
      app.directive('blogPanels', function() {
          return {
              restrict: 'E',
              templateUrl: 'blog-panels.html',
              controller: function() {
                  this.tab = 1; //asigan el numero uno a un elemento del tab

                  this.selectTab = function(setTab) {
                      this.tab = setTab;
                  };
                  this.isSelected = function(checkTab) {
                      return this.tab === checkTab;
                  };

              },
              controllerAs: 'panel'
          };
      });
  })();