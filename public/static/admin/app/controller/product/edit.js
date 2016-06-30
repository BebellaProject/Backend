Bebella.controller('ProductEditCtrl', ['$scope', '$stateParams', 'ProductRepository', 'CategoryRepository',
    function ($scope, $stateParams, ProductRepository, CategoryRepository) {
    
        $scope.edit = function () {
            ProductRepository.edit($scope.product).then(
                function onSuccess (product) {
                    alert("Produto editado com sucesso.");
                },
                function onError (res) {
                    alert("Erro ao criar este produto.");
                }
            );
        };
        
        ProductRepository.find($stateParams.productId).then(
            function onSuccess (product) {
                $scope.product = product;
            },
            function onError (res) {
                alert("Houve um erro na obtenção dos dados deste produto");
            }
        );

        CategoryRepository.all().then(
            function onSuccess (list) {
                $scope.categories = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de categorias");
            }
        );
        
    }
]);

