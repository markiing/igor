/*app = angular.module('app', []);
app.controller('ProdutosController', ['$scope', '$http', function ($scope, $http) {
	$http.get('getProdutos.php')
	.then(function(response) {
		$scope.produtos = response.data;
		console.log(response);
	})
	
	#scope.editarProduto = function(id){
		$http.get("getProdutoById.php?id=" + id)
		.then(function(response) {
			$scope.edita_produto = response.data;
			console.log(response);
		});
	};
	
}]);*/