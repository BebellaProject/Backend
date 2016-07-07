Bebella.controller('ProductOptionNewCtrl', ['$scope', 'StoreRepository', 'ProductRepository', 'ProductOptionRepository', 'CurrentProductOption',
    function ($scope, StoreRepository, ProductRepository, ProductOptionRepository, CurrentProductOption) {
    
        $scope.product_option = CurrentProductOption.get();
    
        StoreRepository.all().then(
            function onSuccess (list) {
                $scope.stores = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de lojas");
            }
        );

        ProductRepository.all().then(
            function onSuccess (list) {
                $scope.products = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de lojas");
            }
        );
    
        $scope.create = function () {
            ProductOptionRepository.save($scope.product_option).then(
                function onSuccess (product_option) {
                    alert(product_option.id);
                    alert("Opção de produto cadastrada com sucesso");
                },
                function onError (res) {
                    alert("Erro ao cadastrar opção de produto.");
                }
            );
        };
    
    
        $scope.clear = function () {
            CurrentProductOption.clear();
            
            $scope.product_option = CurrentProductOption.get();
        };
    
    }
]);

