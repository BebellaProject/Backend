Bebella.controller('ProductNewCtrl', ['$scope', 'CurrentProduct', 'CategoryRepository', 'ProductRepository',
    function ($scope, CurrentProduct, CategoryRepository, ProductRepository) {
        
        $scope.product = CurrentProduct.get();
        
        $scope.create = function () {
            ProductRepository.save($scope.product).then(
                function onSuccess (product) {
                    alert(product.id);
                    alert("Produto criado com sucesso.");
                },
                function onError () {
                    alert("Houve um erro na criação do produto.");
                }
            );
        };
        
        $scope.clear = function () {
            CurrentProduct.clear();
            $scope.product = CurrentProduct.get();
        };
        
        CategoryRepository.all().then(
            function onSuccess (list) {
                $scope.categories = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção das lista de categorias");
            }
        );
        
    }
]);

