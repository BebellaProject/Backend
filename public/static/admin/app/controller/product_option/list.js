Bebella.controller('ProductOptionListCtrl', ['$scope', 'ProductOptionRepository',
    function ($scope, ProductOptionRepository) {
        
        ProductOptionRepository.all().then(
            function onSuccess (list) {
                $scope.product_options = list;
            },
            function onError (res) {
                alert("Houve um erro na obtenção da lista de opções de produto.");
            }
        );
        
    }
]);
