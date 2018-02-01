app = angular.module('app', []);
app.controller('ProdutosController', ['$scope', '$http', function ($scope, $http) {
    $http.get('getProdutos.php')
    .success(function(data) {
        $scope.produtos = data;
    });
}]);

/*angular.module('app').config(['$controllerProvider', function($controllerProvider) {
	$controllerProvider.allowGlobals();
}]);*/