/*function ProdutosController($scope, $http) {
	$scope.produtos = [
		{id: 'Id teste', descricao: 'Descricao teste', quantidade: 2, data: '01-01-2000'},
		{id: 'Id teste 2', descricao: 'Descricao teste 2', quantidade: 5, data: '01-01-2000'}
	];
	
	$scope.produtos = null;
	data = function(){
		$http.get("getProdutos.php", {}).success(function(response){console.log(response); $scope.produtos=response;});
	}
	console.log($scope.produtos);
	
}*/