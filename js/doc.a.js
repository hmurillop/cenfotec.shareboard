(function() {
	var app = angular.module('shareboard', []);

	app.controller('DocNavCtrl', ['$scope', '$http', function ($scope, $http) {
		$scope.tab = 1;

		$scope.tabSelected = function  (navTab) {
			return $scope.tab == navTab;
		};
		$scope.selectTab = function  (selectedTab) {
			$scope.tab = selectedTab;
		};

	}]);
	
})();